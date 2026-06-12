export function Stats({ stats }: { stats: any }) {
  if (!stats) return null;
  
  const items = [
    { label: "Verified Professionals", value: stats.verified_professionals + "+" },
    { label: "Projects Completed", value: stats.total_projects + "+" },
    { label: "Happy Customers", value: stats.happy_customers + "+" },
    { label: "Cities Covered", value: stats.cities_covered },
  ];

  return (
    <section className="w-full bg-white border-b py-10">
      <div className="container mx-auto px-4">
        <div className="grid grid-cols-2 md:grid-cols-4 gap-8 divide-x divide-slate-100">
          {items.map((item, i) => (
            <div key={i} className="flex flex-col items-center justify-center text-center px-4">
              <h3 className="text-3xl md:text-5xl font-bold text-slate-900 tracking-tight mb-2">
                {item.value}
              </h3>
              <p className="text-sm md:text-base font-medium text-slate-500 uppercase tracking-wider">
                {item.label}
              </p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
