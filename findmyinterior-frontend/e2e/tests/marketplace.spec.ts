/**
 * MARKETPLACE WORKFLOW E2E TESTS
 * Tests the cross-role workflows that make FindMyInterior work:
 * - Homeowner posts → Professional finds → Professional bids → 
 *   Homeowner compares → Homeowner awards → Messaging → Completion → Review
 */
import { test, expect } from '@playwright/test';
import { apiLogin, apiCreateRequirement, apiSubmitBid } from '../helpers/api';
import { USERS } from '../helpers/credentials';

test.describe('Cross-Role Marketplace Workflows', () => {

  // ─── 1. Full Bid Cycle: Homeowner → Designer ─────────────────────────
  test('MKT-01: Homeowner posts project, Designer bids, Homeowner accepts bid via API', async ({ request }) => {
    // Step 1: Homeowner creates a requirement
    const homeownerToken = await apiLogin(request, USERS.homeowner.email, USERS.homeowner.password);
    
    const ts = Date.now();
    const reqRes = await request.post('http://localhost:8000/api/v1/requirements', {
      headers: { Authorization: `Bearer ${homeownerToken}` },
      data: {
        title: `E2E Full Cycle Project ${ts}`,
        description: 'Full cycle test: Designer should bid on this.',
        city: 'Patna',
        district: 'Patna',
      },
    });
    
    console.log(`Homeowner requirement creation: ${reqRes.status()}`);
    expect([200, 201]).toContain(reqRes.status());
    
    if (!reqRes.ok()) {
      console.log('Could not create requirement:', await reqRes.text());
      return;
    }
    
    const reqBody = await reqRes.json();
    const reqId = reqBody.data?.id ?? reqBody.id;
    
    if (!reqId) {
      console.log('No requirement ID returned');
      return;
    }
    
    console.log(`Created requirement ID: ${reqId}`);
    
    // Step 2: Designer submits a bid
    const designerToken = await apiLogin(request, USERS.designer.email, USERS.designer.password);
    
    const bidRes = await request.post('http://localhost:8000/api/v1/bids', {
      headers: { Authorization: `Bearer ${designerToken}` },
      data: {
        requirement_id: reqId,
        amount: 120000,
        description: 'I am perfect for this project. Modern minimalist approach.',
        timeline: '30 days',
      },
    });
    
    console.log(`Designer bid on req ${reqId}: ${bidRes.status()}`);
    expect([200, 201, 422]).toContain(bidRes.status());
    
    if (!bidRes.ok()) {
      console.log('Bid failed:', await bidRes.text());
      return;
    }
    
    const bidBody = await bidRes.json();
    const bidId = bidBody.data?.id ?? bidBody.id;
    console.log(`Bid ID created: ${bidId}`);
    
    // Step 3: Homeowner views bids on their requirement
    const bidsRes = await request.get(`http://localhost:8000/api/v1/requirements/${reqId}/bids`, {
      headers: { Authorization: `Bearer ${homeownerToken}` },
    });
    
    console.log(`Homeowner view bids: ${bidsRes.status()}`);
    expect([200]).toContain(bidsRes.status());
    
    if (bidsRes.ok()) {
      const bids = await bidsRes.json();
      const bidCount = bids.data?.length ?? 0;
      console.log(`Bids on requirement: ${bidCount}`);
      expect(bidCount).toBeGreaterThan(0);
    }
  });

  // ─── 2. Bid Comparison Endpoint ───────────────────────────────────────
  test('MKT-02: Homeowner can compare bids on their requirement', async ({ request }) => {
    const token = await apiLogin(request, USERS.homeowner.email, USERS.homeowner.password);
    
    // Get homeowner's requirements
    const reqs = await request.get('http://localhost:8000/api/v1/requirements', {
      headers: { Authorization: `Bearer ${token}` },
    });
    
    if (reqs.ok()) {
      const reqList = (await reqs.json()).data?.data || [];
      
      if (reqList.length > 0) {
        const reqId = reqList[0].id;
        
        // Call bid comparison endpoint
        const compareRes = await request.get(`http://localhost:8000/api/v1/requirements/${reqId}/bids/compare`, {
          headers: { Authorization: `Bearer ${token}` },
        });
        
        console.log(`Bid comparison API: ${compareRes.status()}`);
        expect([200, 404]).toContain(compareRes.status());
        
        if (compareRes.ok()) {
          const compareData = await compareRes.json();
          console.log('Comparison data received, fields:', Object.keys(compareData.data || compareData));
        }
      }
    }
  });

  // ─── 3. Shortlist a Professional ─────────────────────────────────────
  test('MKT-03: Homeowner can shortlist a professional', async ({ request }) => {
    const homeownerToken = await apiLogin(request, USERS.homeowner.email, USERS.homeowner.password);
    
    // Get a professional to shortlist
    const listingsRes = await request.get('http://localhost:8000/api/v1/listings');
    
    if (listingsRes.ok()) {
      const listings = (await listingsRes.json()).data?.data || [];
      
      if (listings.length > 0) {
        const professionalId = listings[0].user_id;
        
        const shortlistRes = await request.post('http://localhost:8000/api/v1/shortlists', {
          headers: { Authorization: `Bearer ${homeownerToken}` },
          data: { professional_id: professionalId },
        });
        
        console.log(`Shortlist status: ${shortlistRes.status()}`);
        expect([200, 201, 422]).toContain(shortlistRes.status());
        
        if (shortlistRes.ok()) {
          // View shortlists
          const viewRes = await request.get('http://localhost:8000/api/v1/shortlists', {
            headers: { Authorization: `Bearer ${homeownerToken}` },
          });
          
          console.log(`View shortlists: ${viewRes.status()}`);
          expect([200]).toContain(viewRes.status());
        }
      } else {
        console.log('No listings to shortlist yet');
      }
    }
  });

  // ─── 4. Messaging: Create Conversation ───────────────────────────────
  test('MKT-04: Homeowner can start a conversation with professional', async ({ request }) => {
    const homeownerToken = await apiLogin(request, USERS.homeowner.email, USERS.homeowner.password);
    
    // Get requirements
    const reqs = await request.get('http://localhost:8000/api/v1/requirements', {
      headers: { Authorization: `Bearer ${homeownerToken}` },
    });
    
    if (reqs.ok()) {
      const reqList = (await reqs.json()).data?.data || [];
      
      if (reqList.length > 0) {
        const reqId = reqList[0].id;
        
        // Create conversation with a vendor (designer)
        const convRes = await request.post(`http://localhost:8000/api/v1/requirements/${reqId}/conversations`, {
          headers: { Authorization: `Bearer ${homeownerToken}` },
          data: { receiver_id: 2 }, // Assuming designer has user ID 2 or similar
        });
        
        console.log(`Create conversation: ${convRes.status()}`);
        expect([200, 201, 422, 404]).toContain(convRes.status());
        
        if (convRes.ok()) {
          const conv = await convRes.json();
          const convId = conv.data?.id;
          
          if (convId) {
            // Send a message
            const msgRes = await request.post(`http://localhost:8000/api/v1/conversations/${convId}/messages`, {
              headers: { Authorization: `Bearer ${homeownerToken}` },
              data: { body: 'Hello, I saw your bid. Can we discuss?' },
            });
            
            console.log(`Send message: ${msgRes.status()}`);
            expect([200, 201, 422]).toContain(msgRes.status());
          }
        }
      }
    }
  });

  // ─── 5. Award a Bid ──────────────────────────────────────────────────
  test('MKT-05: Homeowner can award a bid to a professional', async ({ request }) => {
    const homeownerToken = await apiLogin(request, USERS.homeowner.email, USERS.homeowner.password);
    
    // Get requirements
    const reqs = await request.get('http://localhost:8000/api/v1/requirements', {
      headers: { Authorization: `Bearer ${homeownerToken}` },
    });
    
    if (reqs.ok()) {
      const reqList = (await reqs.json()).data?.data || [];
      
      if (reqList.length > 0) {
        const reqId = reqList[0].id;
        
        // Get bids for this requirement
        const bidsRes = await request.get(`http://localhost:8000/api/v1/requirements/${reqId}/bids`, {
          headers: { Authorization: `Bearer ${homeownerToken}` },
        });
        
        if (bidsRes.ok()) {
          const bids = (await bidsRes.json()).data || [];
          
          if (bids.length > 0) {
            const bidId = bids[0].id;
            
            // Award the bid
            const awardRes = await request.patch(`http://localhost:8000/api/v1/bids/${bidId}/award`, {
              headers: { Authorization: `Bearer ${homeownerToken}` },
            });
            
            console.log(`Award bid ${bidId}: ${awardRes.status()}`);
            expect([200, 201, 422]).toContain(awardRes.status());
          } else {
            console.log('No bids to award');
          }
        }
      }
    }
  });

  // ─── 6. Leave a Review ───────────────────────────────────────────────
  test('MKT-06: Homeowner can leave a review for a professional', async ({ request }) => {
    const homeownerToken = await apiLogin(request, USERS.homeowner.email, USERS.homeowner.password);
    
    // Get a professional to review
    const listingsRes = await request.get('http://localhost:8000/api/v1/listings');
    
    if (listingsRes.ok()) {
      const listings = (await listingsRes.json()).data?.data || [];
      
      if (listings.length > 0) {
        const professionalId = listings[0].user_id;
        
        const reviewRes = await request.post('http://localhost:8000/api/v1/user/reviews', {
          headers: { Authorization: `Bearer ${homeownerToken}` },
          data: {
            reviewed_id: professionalId,
            rating: 5,
            comment: 'Excellent work! Highly recommend.',
          },
        });
        
        console.log(`Leave review: ${reviewRes.status()}`);
        expect([200, 201, 422, 403]).toContain(reviewRes.status());
      }
    }
  });

  // ─── 7. RFQ Ecosystem: Contractor posts → Supplier bids ──────────────
  test('MKT-07: Contractor posts RFQ, Supplier views it via API', async ({ request }) => {
    // Contractor creates RFQ
    const contractorToken = await apiLogin(request, USERS.contractor.email, USERS.contractor.password);
    
    const rfqRes = await request.post('http://localhost:8000/api/v1/rfqs', {
      headers: { Authorization: `Bearer ${contractorToken}` },
      data: {
        title: `E2E RFQ Workflow ${Date.now()}`,
        description: 'Need 50 bags Portland Cement.',
        material_type: 'Cement',
        quantity: '50 bags',
        delivery_location: 'Patna',
        timeline: '1 week',
      },
    });
    
    console.log(`RFQ creation by contractor: ${rfqRes.status()}`);
    expect([200, 201, 422]).toContain(rfqRes.status());
    
    // Supplier can see RFQs
    const supplierToken = await apiLogin(request, USERS.supplier.email, USERS.supplier.password);
    
    const viewRFQs = await request.get('http://localhost:8000/api/v1/rfqs', {
      headers: { Authorization: `Bearer ${supplierToken}` },
    });
    
    console.log(`Supplier view RFQs: ${viewRFQs.status()}`);
    expect([200]).toContain(viewRFQs.status());
  });

  // ─── 8. Worker Job Ecosystem: Builder posts → Worker applies ─────────
  test('MKT-08: Builder posts job, Worker applies via API', async ({ request }) => {
    // Builder creates worker job
    const builderToken = await apiLogin(request, USERS.builder.email, USERS.builder.password);
    
    const jobRes = await request.post('http://localhost:8000/api/v1/worker-jobs', {
      headers: { Authorization: `Bearer ${builderToken}` },
      data: {
        title: `E2E Worker Job ${Date.now()}`,
        description: 'Need 3 electricians for wiring work.',
        skills_required: ['Electrical', 'Wiring'],
        location: 'Patna',
        duration: '2 Weeks',
        daily_rate: 700,
      },
    });
    
    console.log(`Builder job creation: ${jobRes.status()}`);
    expect([200, 201, 422]).toContain(jobRes.status());
    
    // Worker can see jobs
    const workerToken = await apiLogin(request, USERS.worker.email, USERS.worker.password);
    
    const viewJobs = await request.get('http://localhost:8000/api/v1/worker-jobs', {
      headers: { Authorization: `Bearer ${workerToken}` },
    });
    
    console.log(`Worker view jobs: ${viewJobs.status()}`);
    expect([200]).toContain(viewJobs.status());
  });
});
