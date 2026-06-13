"use client";

import { useEffect, useState } from "react";
import { useRouter } from "next/navigation";
import { useAuthStore } from "@/lib/store/useAuthStore";
import api from "@/lib/api";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { Badge } from "@/components/ui/badge";
import { Button } from "@/components/ui/button";
import { ShieldAlert, Users, Home, TrendingUp, CheckCircle, XCircle, IndianRupee, Gavel, Key, Briefcase } from "lucide-react";

export default function AdminDashboard() {
  const { user, token } = useAuthStore();
  const router = useRouter();
  const [data, setData] = useState<any>(null);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    if (!token || user?.role !== 'admin') {
      router.push("/login");
      return;
    }

    const fetchAdminData = async () => {
      try {
        const res = await api.get("/admin/dashboard");
        setData(res.data.data);
      } catch (err) {
        console.error("Admin fetch error", err);
      } finally {
        setLoading(false);
      }
    };

    fetchAdminData();
  }, [token, user, router]);

  const verifyListing = async (id: number) => {
    try {
      await api.patch(`/admin/listings/${id}/verify`);
      // Refresh
      const res = await api.get("/admin/dashboard");
      setData(res.data.data);
    } catch (err) {
      alert("Failed to verify listing");
    }
  };

  if (loading) return <div className="p-20 text-center">Loading Admin Panel...</div>;

  const stats = data?.stats || {};
  const formatter = new Intl.NumberFormat('en-IN', {
    style: 'currency',
    currency: 'INR',
    maximumFractionDigits: 0
  });

  return (
    <div className="bg-slate-100 min-h-screen py-8">
      <div className="container mx-auto px-4">
        <div className="mb-8 flex items-center justify-between">
          <div>
            <h1 className="text-3xl font-bold text-slate-900 flex items-center">
              <ShieldAlert className="h-8 w-8 text-indigo-600 mr-2" /> Admin Control Center
            </h1>
            <p className="text-slate-500 mt-1">Platform overview, revenue metrics, and pending verifications</p>
          </div>
        </div>

        {/* ---------------- REVENUE ROW ---------------- */}
        <h2 className="text-xl font-bold mb-4 text-slate-800 flex items-center"><IndianRupee className="mr-2" /> Financial Overview</h2>
        <div className="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
          <Card className="bg-gradient-to-br from-indigo-50 to-white border-indigo-100">
            <CardContent className="p-6">
              <div className="text-sm text-indigo-600 font-bold uppercase tracking-wider mb-2">Total Revenue</div>
              <div className="text-3xl font-bold text-slate-900">{formatter.format(stats.total_revenue || 0)}</div>
            </CardContent>
          </Card>
          <Card>
            <CardContent className="p-6">
              <div className="text-sm text-slate-500 font-medium mb-2 flex items-center"><Key className="w-4 h-4 mr-1 text-orange-500"/> Contact Unlocks</div>
              <div className="text-2xl font-bold">{formatter.format(stats.unlock_revenue || 0)}</div>
            </CardContent>
          </Card>
          <Card>
            <CardContent className="p-6">
              <div className="text-sm text-slate-500 font-medium mb-2 flex items-center"><Gavel className="w-4 h-4 mr-1 text-green-600"/> Bid Revenue</div>
              <div className="text-2xl font-bold">{formatter.format(stats.bid_revenue || 0)}</div>
            </CardContent>
          </Card>
          <Card>
            <CardContent className="p-6">
              <div className="text-sm text-slate-500 font-medium mb-2 flex items-center"><TrendingUp className="w-4 h-4 mr-1 text-purple-600"/> Subscription Revenue</div>
              <div className="text-2xl font-bold">{formatter.format(stats.subscription_revenue || 0)}</div>
            </CardContent>
          </Card>
        </div>

        {/* ---------------- PLATFORM METRICS ROW ---------------- */}
        <h2 className="text-xl font-bold mb-4 text-slate-800 flex items-center"><Briefcase className="mr-2" /> Marketplace Activity</h2>
        <div className="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
          <Card>
            <CardContent className="p-6 flex items-center gap-4">
              <div className="p-4 bg-blue-100 text-blue-600 rounded-lg"><Users className="h-6 w-6"/></div>
              <div>
                <div className="text-sm text-slate-500 font-medium">Total Users</div>
                <div className="text-xl font-bold">{stats.total_users || 0}</div>
              </div>
            </CardContent>
          </Card>
          <Card>
            <CardContent className="p-6 flex items-center gap-4">
              <div className="p-4 bg-orange-100 text-orange-600 rounded-lg"><Briefcase className="h-6 w-6"/></div>
              <div>
                <div className="text-sm text-slate-500 font-medium">Requirements</div>
                <div className="text-xl font-bold">{stats.total_requirements || 0}</div>
                <div className="text-xs text-green-600">{stats.open_requirements || 0} open</div>
              </div>
            </CardContent>
          </Card>
          <Card>
            <CardContent className="p-6 flex items-center gap-4">
              <div className="p-4 bg-green-100 text-green-600 rounded-lg"><Gavel className="h-6 w-6"/></div>
              <div>
                <div className="text-sm text-slate-500 font-medium">Total Bids</div>
                <div className="text-xl font-bold">{stats.total_bids || 0}</div>
              </div>
            </CardContent>
          </Card>
          <Card>
            <CardContent className="p-6 flex items-center gap-4">
              <div className="p-4 bg-indigo-100 text-indigo-600 rounded-lg"><Home className="h-6 w-6"/></div>
              <div>
                <div className="text-sm text-slate-500 font-medium">Active Professionals</div>
                <div className="text-xl font-bold">{stats.active_professionals || 0}</div>
              </div>
            </CardContent>
          </Card>
        </div>

        <div className="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
          {/* Top Professionals */}
          <Card>
            <CardHeader>
              <CardTitle>Top Engaging Professionals</CardTitle>
            </CardHeader>
            <CardContent>
              {data?.top_professionals && data.top_professionals.length > 0 ? (
                <div className="space-y-4">
                  {data.top_professionals.map((pro: any) => (
                    <div key={pro.id} className="flex justify-between items-center border-b pb-2">
                      <div>
                        <div className="font-bold">{pro.name}</div>
                        <Badge variant="outline" className="capitalize">{pro.role}</Badge>
                      </div>
                      <div className="text-right">
                        <div className="text-sm font-medium text-slate-700">{pro.submitted_bids_count} Bids</div>
                        <div className="text-xs text-slate-500">{pro.contact_unlocks_count} Unlocks</div>
                      </div>
                    </div>
                  ))}
                </div>
              ) : (
                <div className="text-slate-500 text-center">No activity yet.</div>
              )}
            </CardContent>
          </Card>

          {/* Top Districts */}
          <Card>
            <CardHeader>
              <CardTitle>Top Districts by Requirements</CardTitle>
            </CardHeader>
            <CardContent>
              {data?.top_districts && data.top_districts.length > 0 ? (
                <div className="space-y-4">
                  {data.top_districts.map((dist: any, idx: number) => (
                    <div key={idx} className="flex justify-between items-center border-b pb-2">
                      <div className="font-medium text-slate-800">{dist.district || "Unspecified"}</div>
                      <Badge className="bg-orange-600">{dist.total} Projects</Badge>
                    </div>
                  ))}
                </div>
              ) : (
                <div className="text-slate-500 text-center">No requirement data.</div>
              )}
            </CardContent>
          </Card>
        </div>


        {/* Action Required: Pending Verifications */}
        <Card className="border-t-4 border-t-indigo-600">
          <CardHeader>
            <CardTitle>Action Required: Pending Verifications</CardTitle>
          </CardHeader>
          <CardContent>
            {data?.pending_verifications && data.pending_verifications.length > 0 ? (
              <div className="overflow-x-auto">
                <table className="w-full text-sm text-left">
                  <thead className="bg-slate-50 text-slate-500">
                    <tr>
                      <th className="px-4 py-3">Business Title</th>
                      <th className="px-4 py-3">Type</th>
                      <th className="px-4 py-3">City</th>
                      <th className="px-4 py-3">Owner Email</th>
                      <th className="px-4 py-3 text-right">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    {data.pending_verifications.map((item: any) => (
                      <tr key={item.id} className="border-b">
                        <td className="px-4 py-4 font-medium text-slate-900">{item.title || item.company_name || item.name}</td>
                        <td className="px-4 py-4"><Badge variant="outline">{item.type || 'Listing'}</Badge></td>
                        <td className="px-4 py-4">{item.city}</td>
                        <td className="px-4 py-4">{item.user?.email}</td>
                        <td className="px-4 py-4 text-right">
                          <Button size="sm" onClick={() => verifyListing(item.id)} className="bg-green-600 hover:bg-green-700">
                            <CheckCircle className="h-4 w-4 mr-1" /> Approve
                          </Button>
                        </td>
                      </tr>
                    ))}
                  </tbody>
                </table>
              </div>
            ) : (
              <div className="text-center py-12 text-slate-500">
                <CheckCircle className="h-12 w-12 text-green-200 mx-auto mb-3" />
                All caught up! No pending verifications right now.
              </div>
            )}
          </CardContent>
        </Card>

      </div>
    </div>
  );
}
