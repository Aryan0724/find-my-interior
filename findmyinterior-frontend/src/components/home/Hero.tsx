"use client";

import { useState } from "react";
import Link from "next/link";
import { useRouter } from "next/navigation";
import { 
  MapPin, 
  ChevronDown, 
  ShieldCheck, 
  FileText, 
  IndianRupee, 
  Lock, 
  CheckCircle2,
  Settings,
  Wallet
} from "lucide-react";

export function Hero() {
  const router = useRouter();
  const [city, setCity] = useState("Patna");
  const [service, setService] = useState("All Services");

  const handleSearch = () => {
    const params = new URLSearchParams();
    if (city !== "All Cities") params.append("city", city);
    if (service !== "All Services") params.append("search", service);
    router.push(`/professionals?${params.toString()}`);
  };

  return (
    <section className="relative w-full min-h-[500px] flex items-center bg-white overflow-hidden">
      {/* Background Image with Gradient Fade */}
      <div 
        className="absolute inset-0 z-0 bg-[url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=2070&auto=format&fit=crop')] bg-cover bg-center"
      />
      <div className="absolute inset-0 z-10 bg-gradient-to-r from-white via-white/90 to-transparent w-full md:w-[70%]" />
      
      <div className="container relative z-20 mx-auto px-4 py-12 md:py-20 flex flex-col lg:flex-row items-center justify-between gap-8">
        
        {/* Left Content */}
        <div className="w-full lg:w-[60%] flex flex-col">
          <h1 className="text-4xl md:text-5xl lg:text-[3.25rem] font-bold tracking-tight text-[#0a1c3a] leading-tight mb-4">
            Find, Compare & Hire<br/>
            Best Experts for Your<br/>
            <span className="text-[#0a1c3a]">Home & Project Needs</span>
          </h1>
          
          <p className="text-base md:text-lg text-gray-700 mb-6 max-w-2xl font-medium leading-relaxed">
            Interior Designers, Contractors, Architects, Skilled Workers,<br/>
            Suppliers & More — All in One Place Across Bihar.
          </p>

          {/* 4 Value Props */}
          <div className="flex flex-wrap items-center gap-4 md:gap-6 mb-8">
            <div className="flex items-center text-sm font-semibold text-gray-800">
              <ShieldCheck className="w-5 h-5 text-[#E8701A] mr-1.5" /> Verified Professionals
            </div>
            <div className="flex items-center text-sm font-semibold text-gray-800">
              <FileText className="w-5 h-5 text-[#E8701A] mr-1.5" /> Multiple Quotes
            </div>
            <div className="flex items-center text-sm font-semibold text-gray-800">
              <IndianRupee className="w-5 h-5 text-[#E8701A] mr-1.5" /> Best Price Guarantee
            </div>
            <div className="flex items-center text-sm font-semibold text-gray-800">
              <Lock className="w-5 h-5 text-[#E8701A] mr-1.5" /> 100% Secure
            </div>
          </div>
          
          {/* Main Search Box */}
          <div className="w-full max-w-3xl bg-white p-2 rounded-xl shadow-[0_8px_30px_rgb(0,0,0,0.12)] border border-gray-100 flex flex-col md:flex-row gap-2">
            {/* City */}
            <div className="flex-1 flex flex-col justify-center px-4 py-2 border-b md:border-b-0 md:border-r border-gray-200 cursor-pointer hover:bg-gray-50 rounded-lg transition">
              <span className="text-[0.65rem] text-gray-500 font-medium uppercase tracking-wider mb-0.5">Select City</span>
              <div className="flex items-center justify-between">
                <input 
                  type="text"
                  value={city}
                  onChange={(e) => setCity(e.target.value)}
                  className="bg-transparent font-semibold text-[#0a1c3a] outline-none w-full"
                  placeholder="e.g. Patna"
                />
              </div>
            </div>
            {/* Service */}
            <div className="flex-1 flex flex-col justify-center px-4 py-2 border-b md:border-b-0 md:border-r border-gray-200 cursor-pointer hover:bg-gray-50 rounded-lg transition">
              <span className="text-[0.65rem] text-gray-500 font-medium uppercase tracking-wider mb-0.5">Select Service</span>
              <div className="flex items-center justify-between">
                <input 
                  type="text"
                  value={service}
                  onChange={(e) => setService(e.target.value)}
                  className="bg-transparent font-semibold text-[#0a1c3a] outline-none w-full"
                  placeholder="All Services"
                />
              </div>
            </div>
            {/* Budget */}
            <div className="flex-1 flex flex-col justify-center px-4 py-2 border-b md:border-b-0 md:border-r border-gray-200 cursor-pointer hover:bg-gray-50 rounded-lg transition">
              <span className="text-[0.65rem] text-gray-500 font-medium uppercase tracking-wider mb-0.5">Select Budget</span>
              <div className="flex items-center justify-between">
                <div className="flex items-center font-semibold text-[#0a1c3a]">
                  <Wallet className="w-4 h-4 mr-1.5 text-gray-400" /> All Budget
                </div>
                <ChevronDown className="w-4 h-4 text-gray-400" />
              </div>
            </div>
            {/* Button */}
            <button 
              onClick={handleSearch}
              className="bg-[#0a1c3a] hover:bg-[#0a1c3a]/90 text-white font-semibold text-sm px-6 py-4 rounded-lg shadow-md transition flex items-center justify-center whitespace-nowrap h-full"
            >
              SEARCH PROS <span className="ml-2">›</span>
            </button>
          </div>
          
          {/* Popular Searches */}
          <div className="mt-4 flex flex-wrap items-center gap-2 text-xs">
            <span className="font-semibold text-gray-700 mr-2">Popular Searches:</span>
            {["Interior Designer", "Modular Kitchen", "Painter", "False Ceiling", "Carpenter", "Tiles Supplier", "Architect"].map((term) => (
              <Link 
                key={term} 
                href={`/professionals?search=${encodeURIComponent(term)}`}
                className="bg-gray-100 hover:bg-gray-200 text-gray-600 px-3 py-1.5 rounded-md cursor-pointer transition"
              >
                {term}
              </Link>
            ))}
          </div>
        </div>

        {/* Right Content - Lead Card */}
        <div className="w-full lg:w-[35%] max-w-sm mt-8 lg:mt-0">
          <div className="bg-white rounded-2xl shadow-[0_20px_50px_rgba(0,0,0,0.15)] overflow-hidden border border-gray-100">
            {/* Header */}
            <div className="bg-[#0a1c3a] text-white p-6">
              <h3 className="text-xl font-bold mb-1">Post Your Requirement</h3>
              <p className="text-sm text-white/80">Get Free Quotes from Experts</p>
            </div>
            {/* Body */}
            <div className="p-6 space-y-5">
              <div className="flex items-start">
                <div className="bg-orange-100 p-2 rounded-full mr-4 shrink-0">
                  <FileText className="w-4 h-4 text-[#E8701A]" />
                </div>
                <div>
                  <h4 className="font-semibold text-sm text-gray-800">Share Your Requirement</h4>
                </div>
              </div>
              <div className="flex items-start">
                <div className="bg-orange-100 p-2 rounded-full mr-4 shrink-0">
                  <ShieldCheck className="w-4 h-4 text-[#E8701A]" />
                </div>
                <div>
                  <h4 className="font-semibold text-sm text-gray-800">Receive Multiple Quotes</h4>
                </div>
              </div>
              <div className="flex items-start">
                <div className="bg-orange-100 p-2 rounded-full mr-4 shrink-0">
                  <IndianRupee className="w-4 h-4 text-[#E8701A]" />
                </div>
                <div>
                  <h4 className="font-semibold text-sm text-gray-800">Compare & Save Money</h4>
                </div>
              </div>
              <div className="flex items-start">
                <div className="bg-orange-100 p-2 rounded-full mr-4 shrink-0">
                  <CheckCircle2 className="w-4 h-4 text-[#E8701A]" />
                </div>
                <div>
                  <h4 className="font-semibold text-sm text-gray-800">Hire the Best Expert</h4>
                </div>
              </div>
              
              <Link href="/post-requirement" className="block w-full">
                <button className="w-full bg-[#E8701A] hover:bg-[#E8701A]/90 text-white font-bold py-3.5 rounded-lg shadow-md transition mt-4">
                  POST NOW (It's Free)
                </button>
              </Link>
            </div>
          </div>
        </div>

      </div>
    </section>
  );
}
