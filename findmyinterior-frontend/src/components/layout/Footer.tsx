import Link from "next/link";
import { Mail, MessageCircle, Share2, Globe } from "lucide-react";

export function Footer() {
  return (
    <footer className="border-t bg-slate-50 dark:bg-slate-950">
      <div className="container mx-auto px-4 py-12 md:px-6">
        <div className="grid grid-cols-1 gap-8 md:grid-cols-4">
          <div className="space-y-4">
            <h3 className="text-xl font-bold tracking-tight text-primary">
              FindMyInterior<span className="text-orange-500">.</span>
            </h3>
            <p className="text-sm text-muted-foreground">
              Bihar's largest marketplace connecting homeowners with verified interiors, builders, suppliers, and skilled workers.
            </p>
            <div className="flex gap-4">
              <Link href="#" className="text-muted-foreground hover:text-primary">
                <Share2 className="h-5 w-5" />
                <span className="sr-only">Facebook</span>
              </Link>
              <Link href="#" className="text-muted-foreground hover:text-primary">
                <MessageCircle className="h-5 w-5" />
                <span className="sr-only">Instagram</span>
              </Link>
              <Link href="#" className="text-muted-foreground hover:text-primary">
                <Globe className="h-5 w-5" />
                <span className="sr-only">Twitter</span>
              </Link>
              <Link href="#" className="text-muted-foreground hover:text-primary">
                <Mail className="h-5 w-5" />
                <span className="sr-only">LinkedIn</span>
              </Link>
            </div>
          </div>
          <div className="space-y-4">
            <h4 className="text-sm font-semibold uppercase tracking-wider">For Homeowners</h4>
            <ul className="space-y-2 text-sm text-muted-foreground">
              <li><Link href="/professionals" className="hover:text-primary">Find Professionals</Link></li>
              <li><Link href="/projects" className="hover:text-primary">Browse Projects</Link></li>
              <li><Link href="/post-requirement" className="hover:text-primary">Post a Requirement</Link></li>
              <li><Link href="/how-it-works" className="hover:text-primary">How it Works</Link></li>
            </ul>
          </div>
          <div className="space-y-4">
            <h4 className="text-sm font-semibold uppercase tracking-wider">For Businesses</h4>
            <ul className="space-y-2 text-sm text-muted-foreground">
              <li><Link href="/join" className="hover:text-primary">List Your Business</Link></li>
              <li><Link href="/pricing" className="hover:text-primary">Plans & Pricing</Link></li>
              <li><Link href="/leads" className="hover:text-primary">Browse Leads</Link></li>
              <li><Link href="/success-stories" className="hover:text-primary">Success Stories</Link></li>
            </ul>
          </div>
          <div className="space-y-4">
            <h4 className="text-sm font-semibold uppercase tracking-wider">Company</h4>
            <ul className="space-y-2 text-sm text-muted-foreground">
              <li><Link href="/about" className="hover:text-primary">About Us</Link></li>
              <li><Link href="/contact" className="hover:text-primary">Contact</Link></li>
              <li><Link href="/privacy" className="hover:text-primary">Privacy Policy</Link></li>
              <li><Link href="/terms" className="hover:text-primary">Terms of Service</Link></li>
            </ul>
          </div>
        </div>
        <div className="mt-12 border-t pt-8 text-center text-sm text-muted-foreground">
          <p>© {new Date().getFullYear()} FindMyInterior.com. All rights reserved.</p>
        </div>
      </div>
    </footer>
  );
}
