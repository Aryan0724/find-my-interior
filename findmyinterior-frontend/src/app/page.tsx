import { Hero } from "@/components/home/Hero";
import { Stats } from "@/components/home/Stats";
import { Categories } from "@/components/home/Categories";
import { Hubs } from "@/components/home/Hubs";
import { ActionBanner } from "@/components/home/ActionBanner";
import { TrustFooter } from "@/components/home/TrustFooter";

export default function Home() {
  return (
    <div className="flex flex-col w-full overflow-hidden bg-white">
      <Hero />
      <Stats />
      <Categories />
      <Hubs />
      <ActionBanner />
      <TrustFooter />
    </div>
  );
}
