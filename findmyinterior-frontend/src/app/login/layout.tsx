import { Metadata } from "next";

export const metadata: Metadata = {
  title: "Login | FindMyInterior",
  description: "Login to FindMyInterior to manage your home projects, or find new leads if you are a professional.",
};

export default function LoginLayout({
  children,
}: {
  children: React.ReactNode;
}) {
  return <>{children}</>;
}
