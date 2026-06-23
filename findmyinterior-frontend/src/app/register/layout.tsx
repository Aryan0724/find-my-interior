import { Metadata } from "next";

export const metadata: Metadata = {
  title: "Register | FindMyInterior",
  description: "Create an account on FindMyInterior as a customer or professional to get started.",
};

export default function RegisterLayout({
  children,
}: {
  children: React.ReactNode;
}) {
  return <>{children}</>;
}
