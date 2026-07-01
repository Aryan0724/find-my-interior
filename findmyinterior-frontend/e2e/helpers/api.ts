import { APIRequestContext } from '@playwright/test';

const BACKEND_URL = 'http://localhost:8000';
const FRONTEND_URL = 'http://localhost:3001';

export const API = {
  BACKEND: BACKEND_URL,
  FRONTEND: FRONTEND_URL,
};

/**
 * Login via API and return a token for pre-authenticated state
 */
export async function apiLogin(request: APIRequestContext, email: string, password: string = 'password') {
  const res = await request.post(`${BACKEND_URL}/api/v1/auth/login`, {
    data: { email, password },
  });
  if (!res.ok()) {
    const body = await res.text();
    throw new Error(`Login failed for ${email}: ${res.status()} - ${body}`);
  }
  const body = await res.json();
  return body.data?.token || body.token;
}

/**
 * Create a requirement (project) via API 
 */
export async function apiCreateRequirement(request: APIRequestContext, token: string, data: Record<string, any>) {
  const res = await request.post(`${BACKEND_URL}/api/v1/requirements`, {
    headers: { Authorization: `Bearer ${token}` },
    data,
  });
  if (!res.ok()) {
    const body = await res.text();
    throw new Error(`Failed to create requirement: ${res.status()} - ${body}`);
  }
  return (await res.json()).data;
}

/**
 * Submit a bid via API
 */
export async function apiSubmitBid(request: APIRequestContext, token: string, requirementId: number, data: Record<string, any>) {
  const res = await request.post(`${BACKEND_URL}/api/v1/bids`, {
    headers: { Authorization: `Bearer ${token}` },
    data: { requirement_id: requirementId, ...data },
  });
  if (!res.ok()) {
    const body = await res.text();
    throw new Error(`Failed to submit bid: ${res.status()} - ${body}`);
  }
  return (await res.json()).data;
}

/**
 * Get requirements list via API
 */
export async function apiGetRequirements(request: APIRequestContext, token?: string) {
  const headers: Record<string, string> = {};
  if (token) headers.Authorization = `Bearer ${token}`;
  const res = await request.get(`${BACKEND_URL}/api/v1/requirements`, { headers });
  if (!res.ok()) {
    throw new Error(`Failed to get requirements: ${res.status()}`);
  }
  return (await res.json()).data;
}

/**
 * Add funds to wallet via API
 */
export async function apiAddFunds(request: APIRequestContext, token: string, amount: number) {
  const res = await request.post(`${BACKEND_URL}/api/v1/wallet/add-funds`, {
    headers: { Authorization: `Bearer ${token}` },
    data: { amount },
  });
  return res;
}

/**
 * Get current user info
 */
export async function apiGetMe(request: APIRequestContext, token: string) {
  const res = await request.get(`${BACKEND_URL}/api/v1/auth/me`, {
    headers: { Authorization: `Bearer ${token}` },
  });
  if (!res.ok()) throw new Error(`Failed to get user: ${res.status()}`);
  return (await res.json()).data;
}
