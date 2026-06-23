import { Metadata } from "next";

export const metadata: Metadata = {
  title: "Post a Requirement | FindMyInterior",
  description: "Post your home interior, construction, or material requirement and get quotes from verified professionals in Bihar.",
};

export default function PostRequirementLayout({
  children,
}: {
  children: React.ReactNode;
}) {
  return <>{children}</>;
}
