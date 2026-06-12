"use client";

import { useEffect, useState } from "react";
import { useRouter } from "next/navigation";
import { useAuthStore } from "@/lib/store/useAuthStore";
import api from "@/lib/api";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { Button } from "@/components/ui/button";
import { Badge } from "@/components/ui/badge";
import { User, Settings, LogOut, LayoutDashboard, PlusCircle, MessageSquare } from "lucide-react";

export default function UserDashboard() {
  const { user, token, logout } = useAuthStore();
  const router = useRouter();
  const [data, setData] = useState<any>(null);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    if (!token) {
      router.push("/login");
      return;
    }

    const fetchDashboard = async () => {
      try {
        const res = await api.get("/dashboard");
        setData(res.data);
      } catch (err) {
        console.error("Dashboard fetch error", err);
      } finally {
        setLoading(false);
      }
    };

    fetchDashboard();
  }, [token, router]);

  const handleLogout = () => {
    logout();
    router.push("/login");
  };

  if (!user || loading) return <div className="p-20 text-center">Loading dashboard...</div>;

  return (
    <div className="bg-slate-50 min-h-screen">
      {/* Dashboard Nav */}
      <div className="bg-white border-b">
        <div className="container mx-auto px-4 h-16 flex items-center justify-between">
          <div className="flex items-center gap-2 text-slate-900 font-bold">
            <LayoutDashboard className="h-5 w-5 text-orange-600" /> My Dashboard
          </div>
          <div className="flex items-center gap-4">
            <span className="text-sm font-medium text-slate-600">Welcome, {user.name}</span>
            <Button variant="ghost" size="sm" onClick={handleLogout} className="text-slate-500 hover:text-red-600">
              <LogOut className="h-4 w-4 mr-2" /> Logout
            </Button>
          </div>
        </div>
      </div>

      <div className="container mx-auto px-4 py-8">
        <div className="grid grid-cols-1 lg:grid-cols-4 gap-8">
          
          {/* Sidebar */}
          <div className="lg:col-span-1 space-y-4">
            <Card>
              <CardContent className="p-6 flex flex-col items-center text-center">
                <div className="h-20 w-20 rounded-full bg-slate-100 flex items-center justify-center mb-4 text-2xl font-bold text-slate-400">
                  {user.name.charAt(0)}
                </div>
                <h3 className="font-bold text-lg">{user.name}</h3>
                <Badge className="mt-2 capitalize" variant={user.role === 'customer' ? 'secondary' : 'default'}>
                  {user.role}
                </Badge>
                {user.role !== 'customer' && (
                  <Badge variant="outline" className="mt-2 border-orange-200 text-orange-700 bg-orange-50">
                    {user.subscription?.plan?.name || "Free Plan"}
                  </Badge>
                )}
              </CardContent>
            </Card>

            <div className="bg-white border rounded-xl overflow-hidden flex flex-col">
              <button className="flex items-center p-4 border-b hover:bg-slate-50 text-left">
                <User className="h-5 w-5 mr-3 text-slate-400" /> My Profile
              </button>
              {user.role === 'customer' ? (
                <button className="flex items-center p-4 border-b hover:bg-slate-50 text-left bg-orange-50 text-orange-700 font-medium">
                  <MessageSquare className="h-5 w-5 mr-3 text-orange-600" /> My Inquiries
                </button>
              ) : (
                <>
                  <button className="flex items-center p-4 border-b hover:bg-slate-50 text-left bg-orange-50 text-orange-700 font-medium">
                    <LayoutDashboard className="h-5 w-5 mr-3 text-orange-600" /> Overview
                  </button>
                  <button className="flex items-center p-4 border-b hover:bg-slate-50 text-left">
                    <MessageSquare className="h-5 w-5 mr-3 text-slate-400" /> Leads Received
                  </button>
                </>
              )}
              <button className="flex items-center p-4 hover:bg-slate-50 text-left">
                <Settings className="h-5 w-5 mr-3 text-slate-400" /> Account Settings
              </button>
            </div>
          </div>

          {/* Main Content Area */}
          <div className="lg:col-span-3 space-y-6">
            
            {/* Customer View */}
            {user.role === 'customer' && data && (
              <Card>
                <CardHeader>
                  <CardTitle>My Inquiries</CardTitle>
                </CardHeader>
                <CardContent>
                  {data.inquiries && data.inquiries.length > 0 ? (
                    <div className="space-y-4">
                      {data.inquiries.map((inq: any) => (
                        <div key={inq.id} className="p-4 border rounded-lg bg-slate-50">
                          <div className="flex justify-between items-start mb-2">
                            <span className="font-semibold text-slate-900">Inquiry for {inq.inquirable_type}</span>
                            <Badge variant={inq.status === 'pending' ? 'secondary' : 'default'}>{inq.status}</Badge>
                          </div>
                          <p className="text-slate-600 text-sm">{inq.message}</p>
                          <div className="text-xs text-slate-400 mt-2">{new Date(inq.created_at).toLocaleDateString()}</div>
                        </div>
                      ))}
                    </div>
                  ) : (
                    <div className="text-center py-10 text-slate-500">
                      You haven't sent any inquiries yet. <br />
                      <Button variant="link" onClick={() => router.push('/professionals')} className="text-orange-600 p-0">Browse professionals</Button>
                    </div>
                  )}
                </CardContent>
              </Card>
            )}

            {/* Business View */}
            {user.role !== 'customer' && data && (
              <>
                <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
                  <Card>
                    <CardContent className="p-6">
                      <div className="text-slate-500 text-sm mb-1">Total Profile Views</div>
                      <div className="text-3xl font-bold">{data.stats?.profile_views || 0}</div>
                    </CardContent>
                  </Card>
                  <Card>
                    <CardContent className="p-6">
                      <div className="text-slate-500 text-sm mb-1">Leads Received</div>
                      <div className="text-3xl font-bold text-orange-600">{data.stats?.total_leads || 0}</div>
                    </CardContent>
                  </Card>
                  <Card>
                    <CardContent className="p-6">
                      <div className="text-slate-500 text-sm mb-1">Average Rating</div>
                      <div className="text-3xl font-bold flex items-center">
                        {data.listing?.avg_rating || 0} <Star className="h-5 w-5 fill-amber-400 text-amber-400 ml-2" />
                      </div>
                    </CardContent>
                  </Card>
                </div>

                <Card>
                  <CardHeader className="flex flex-row items-center justify-between">
                    <CardTitle>Recent Leads</CardTitle>
                    {user.subscription?.plan?.name !== 'Premium' && (
                      <Button variant="outline" size="sm" onClick={() => router.push('/pricing')}>
                        Upgrade to Premium to Unlock Leads
                      </Button>
                    )}
                  </CardHeader>
                  <CardContent>
                    {data.leads && data.leads.length > 0 ? (
                      <div className="space-y-4">
                        {data.leads.map((lead: any) => (
                          <div key={lead.id} className="p-4 border rounded-lg bg-slate-50">
                            <div className="flex justify-between items-start mb-2">
                              <span className="font-semibold text-slate-900">{lead.name}</span>
                              <div className="text-xs text-slate-400">{new Date(lead.created_at).toLocaleDateString()}</div>
                            </div>
                            <div className="flex gap-4 mb-3">
                              <span className="text-sm font-medium text-slate-700">📞 {lead.phone}</span>
                              <span className="text-sm font-medium text-slate-700">✉️ {lead.email}</span>
                            </div>
                            <p className="text-slate-600 text-sm bg-white p-3 rounded border">{lead.message}</p>
                          </div>
                        ))}
                      </div>
                    ) : (
                      <div className="text-center py-10 text-slate-500">
                        No leads received yet. Make sure your profile is fully complete!
                      </div>
                    )}
                  </CardContent>
                </Card>
              </>
            )}

          </div>
        </div>
      </div>
    </div>
  );
}
