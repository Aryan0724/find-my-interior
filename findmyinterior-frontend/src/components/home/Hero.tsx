import Link from "next/link";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Search, MapPin } from "lucide-react";

export function Hero() {
  return (
    <section className="relative w-full py-20 md:py-32 lg:py-48 overflow-hidden bg-slate-900">
      {/* Background overlay - assume user replaces with real image in production */}
      <div 
        className="absolute inset-0 z-0 opacity-40 bg-[url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=2070&auto=format&fit=crop')] bg-cover bg-center"
      />
      <div className="absolute inset-0 z-10 bg-gradient-to-t from-slate-900 via-slate-900/60 to-transparent" />
      
      <div className="container relative z-20 mx-auto px-4 text-center">
        <h1 className="text-4xl md:text-6xl font-extrabold tracking-tight text-white mb-6">
          Find the Best <span className="text-orange-500">Interior Designers</span> & <span className="text-orange-500">Builders</span> in Bihar
        </h1>
        <p className="text-lg md:text-xl text-slate-200 mb-10 max-w-3xl mx-auto font-medium">
          The all-in-one marketplace for home improvement, construction materials, and skilled workforce. Verified professionals, transparent pricing.
        </p>
        
        <div className="max-w-4xl mx-auto bg-white p-2 rounded-2xl shadow-xl flex flex-col md:flex-row gap-2">
          <div className="relative flex-1 flex items-center border-b md:border-b-0 md:border-r border-slate-200 px-3">
            <Search className="h-5 w-5 text-muted-foreground mr-2 flex-shrink-0" />
            <Input 
              type="text" 
              placeholder="What are you looking for? (e.g. Interior Designer, Plumber)" 
              className="border-0 shadow-none focus-visible:ring-0 text-base h-12"
            />
          </div>
          <div className="relative flex-1 flex items-center px-3">
            <MapPin className="h-5 w-5 text-muted-foreground mr-2 flex-shrink-0" />
            <Input 
              type="text" 
              placeholder="Location (e.g. Patna, Gaya)" 
              className="border-0 shadow-none focus-visible:ring-0 text-base h-12"
            />
          </div>
          <Button size="lg" className="h-12 px-8 rounded-xl bg-orange-600 hover:bg-orange-700 text-base font-semibold w-full md:w-auto">
            Search
          </Button>
        </div>
        
        <div className="mt-8 flex flex-wrap justify-center gap-4 text-sm text-slate-300">
          <span>Popular:</span>
          <Link href="/search?q=kitchen" className="hover:text-white underline underline-offset-4">Modular Kitchen</Link>
          <Link href="/search?q=architect" className="hover:text-white underline underline-offset-4">Architects</Link>
          <Link href="/search?q=painter" className="hover:text-white underline underline-offset-4">Painters</Link>
          <Link href="/search?q=cement" className="hover:text-white underline underline-offset-4">Cement Suppliers</Link>
        </div>
      </div>
    </section>
  );
}
