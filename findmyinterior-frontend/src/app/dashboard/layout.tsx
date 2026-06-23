import { Metadata } from "next";

export const metadata: Metadata = {
  title: "Dashboard | FindMyInterior",
  description: "Manage your projects, requirements, bids, and profile.",
};

export default function DashboardLayout({
  children,
}: {
  children: React.ReactNode;
}) {
  return <>{children}</>;
}
