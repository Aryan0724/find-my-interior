import { Hero } from "@/components/home/Hero";
import { Stats } from "@/components/home/Stats";
import { Categories } from "@/components/home/Categories";
import { FeaturedPros } from "@/components/home/FeaturedPros";
import { HowItWorks } from "@/components/home/HowItWorks";
import { CallToAction } from "@/components/home/CallToAction";
import { Suspense } from "react";

// Server component to fetch data
async function getHomepageData() {
  try {
    const res = await fetch(`${process.env.NEXT_PUBLIC_API_URL || 'http://localhost:8000/api/v1'}/homepage`, {
      next: { revalidate: 60 }, // Cache for 60 seconds
    });
    if (!res.ok) throw new Error('Failed to fetch homepage data');
    const json = await res.json();
    return json.data;
  } catch (error) {
    console.error(error);
    return null;
  }
}

export default async function Home() {
  const data = await getHomepageData();

  return (
    <div className="flex flex-col w-full">
      <Hero />
      {data?.stats && <Stats stats={data.stats} />}
      {data?.categories && <Categories categories={data.categories} />}
      {data?.featured_listings && <FeaturedPros listings={data.featured_listings} />}
      <HowItWorks />
      <CallToAction />
    </div>
  );
}
