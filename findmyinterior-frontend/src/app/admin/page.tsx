"use client";

import { useEffect, useState } from "react";
import { useRouter } from "next/navigation";
import { useAuthStore } from "@/lib/store/useAuthStore";
import api from "@/lib/api";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { Badge } from "@/components/ui/badge";
import { Button } from "@/components/ui/button";
import { ShieldAlert, Users, Home, TrendingUp, CheckCircle, XCircle } from "lucide-react";

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
        setData(res.data);
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
      await api.post(`/admin/verify-listing/${id}`);
      // Refresh
      const res = await api.get("/admin/dashboard");
      setData(res.data);
    } catch (err) {
      alert("Failed to verify listing");
    }
  };

  if (loading) return <div className="p-20 text-center">Loading Admin Panel...</div>;

  return (
    <div className="bg-slate-100 min-h-screen py-8">
      <div className="container mx-auto px-4">
        <div className="mb-8 flex items-center justify-between">
          <div>
            <h1 className="text-3xl font-bold text-slate-900 flex items-center">
              <ShieldAlert className="h-8 w-8 text-indigo-600 mr-2" /> Admin Control Center
            </h1>
            <p className="text-slate-500 mt-1">Platform overview and pending verifications</p>
          </div>
        </div>

        {/* Stats Row */}
        <div className="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
          <Card>
            <CardContent className="p-6 flex items-center gap-4">
              <div className="p-4 bg-blue-100 text-blue-600 rounded-lg"><Users className="h-6 w-6"/></div>
              <div>
                <div className="text-sm text-slate-500 font-medium">Total Users</div>
                <div className="text-2xl font-bold">{data?.stats?.total_users || 0}</div>
              </div>
            </CardContent>
          </Card>
          <Card>
            <CardContent className="p-6 flex items-center gap-4">
              <div className="p-4 bg-orange-100 text-orange-600 rounded-lg"><Home className="h-6 w-6"/></div>
              <div>
                <div className="text-sm text-slate-500 font-medium">Active Businesses</div>
                <div className="text-2xl font-bold">{data?.stats?.active_businesses || 0}</div>
              </div>
            </CardContent>
          </Card>
          <Card>
            <CardContent className="p-6 flex items-center gap-4">
              <div className="p-4 bg-green-100 text-green-600 rounded-lg"><TrendingUp className="h-6 w-6"/></div>
              <div>
                <div className="text-sm text-slate-500 font-medium">Premium Subs</div>
                <div className="text-2xl font-bold">{data?.stats?.premium_subs || 0}</div>
              </div>
            </CardContent>
          </Card>
          <Card>
            <CardContent className="p-6 flex items-center gap-4">
              <div className="p-4 bg-amber-100 text-amber-600 rounded-lg"><ShieldAlert className="h-6 w-6"/></div>
              <div>
                <div className="text-sm text-slate-500 font-medium">Pending Approvals</div>
                <div className="text-2xl font-bold">{data?.pending_verifications?.length || 0}</div>
              </div>
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
