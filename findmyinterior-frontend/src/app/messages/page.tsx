"use client";

import { useState, useEffect } from "react";
import { Navbar } from "@/components/layout/Navbar";
import { useAuthStore } from "@/lib/store/useAuthStore";
import api from "@/lib/api";
import { 
  Search, 
  MoreVertical, 
  Paperclip, 
  Send, 
  Check, 
  CheckCheck,
  Building2,
  Clock,
  Briefcase
} from "lucide-react";

export default function MessagesPage() {
  const { user } = useAuthStore();
  const [conversations, setConversations] = useState<any[]>([]);
  const [activeConv, setActiveConv] = useState<number | null>(null);
  const [messages, setMessages] = useState<any[]>([]);
  const [message, setMessage] = useState("");
  const [loading, setLoading] = useState(true);

  // Fetch Conversations
  const fetchConversations = async () => {
    try {
      const res = await api.get("/conversations");
      setConversations(res.data);
      if (res.data.length > 0 && activeConv === null) {
        setActiveConv(res.data[0].id);
      }
    } catch (e) {
      console.error("Failed to fetch conversations", e);
    } finally {
      setLoading(false);
    }
  };

  // Fetch Messages for active conversation
  const fetchMessages = async () => {
    if (!activeConv) return;
    try {
      const res = await api.get(`/conversations/${activeConv}/messages`);
      setMessages(res.data.messages || res.data); // Adjust depending on pagination
    } catch (e) {
      console.error("Failed to fetch messages", e);
    }
  };

  useEffect(() => {
    fetchConversations();
  }, []);

  useEffect(() => {
    if (activeConv) {
      fetchMessages();
    }
  }, [activeConv]);

  // Polling simulation hook
  useEffect(() => {
    if (!activeConv) return;
    const pollInterval = setInterval(() => {
      fetchMessages();
    }, 10000); 
    
    return () => clearInterval(pollInterval);
  }, [activeConv]);

  const sendMessage = async () => {
    if (!message.trim() || !activeConv) return;
    try {
      await api.post(`/conversations/${activeConv}/messages`, {
        message: message,
        type: 'text'
      });
      setMessage("");
      fetchMessages();
    } catch (e) {
      alert("Failed to send message");
    }
  };

  const getOtherPartyName = (conv: any) => {
    if (!user) return "User";
    return conv.customer_id === user.id ? conv.vendor?.name : conv.customer?.name;
  };

  const activeConvData = conversations.find(c => c.id === activeConv);

  return (
    <div className="min-h-screen bg-gray-50 flex flex-col font-sans">

      <div className="flex-1 container mx-auto max-w-7xl py-6 px-4 sm:px-6 h-[calc(100vh-140px)]">
        <div className="bg-white rounded-xl shadow-sm border border-gray-200 h-full flex overflow-hidden">
          
          {/* LEFT PANE - CONVERSATIONS */}
          <div className="w-full md:w-[350px] lg:w-[400px] flex-shrink-0 border-r border-gray-200 flex flex-col">
            
            {/* Header */}
            <div className="p-4 border-b border-gray-100 flex items-center justify-between">
              <h1 className="text-xl font-bold text-[#0a1c3a]">Messages</h1>
              <button className="text-gray-400 hover:text-gray-600">
                <MoreVertical className="w-5 h-5" />
              </button>
            </div>
            
            {/* Search */}
            <div className="p-4 border-b border-gray-100">
              <div className="relative">
                <Search className="w-4 h-4 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" />
                <input 
                  type="text" 
                  placeholder="Search conversations..." 
                  className="w-full pl-9 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-1 focus:ring-[#0a1c3a]"
                />
              </div>
            </div>
            
            {/* List */}
            <div className="flex-1 overflow-y-auto">
              {loading && <p className="text-center p-4">Loading...</p>}
              {!loading && conversations.length === 0 && <p className="text-center p-4 text-gray-500">No conversations yet.</p>}
              {conversations.map((conv) => {
                const otherParty = getOtherPartyName(conv);
                return (
                  <div 
                    key={conv.id}
                    onClick={() => setActiveConv(conv.id)}
                    className={`p-4 border-b border-gray-50 cursor-pointer transition-colors hover:bg-gray-50 ${activeConv === conv.id ? 'bg-[#0a1c3a]/5' : ''}`}
                  >
                    <div className="flex items-start gap-3">
                      <div className={`w-12 h-12 rounded-full flex items-center justify-center text-white font-bold text-lg flex-shrink-0 ${activeConv === conv.id ? 'bg-[#E8701A]' : 'bg-[#0a1c3a]'}`}>
                        {otherParty?.charAt(0) || 'U'}
                      </div>
                      <div className="flex-1 min-w-0">
                        <div className="flex justify-between items-start mb-1">
                          <h3 className="text-sm font-bold text-gray-900 truncate pr-2">{otherParty}</h3>
                          <span className="text-xs text-gray-500 whitespace-nowrap">
                            {new Date(conv.updated_at).toLocaleDateString()}
                          </span>
                        </div>
                        <p className="text-xs font-semibold text-[#0a1c3a] mb-1 truncate">{conv.requirement?.title}</p>
                      </div>
                    </div>
                  </div>
                );
              })}
            </div>
          </div>
          
          {/* RIGHT PANE - CHAT WINDOW */}
          <div className="hidden md:flex flex-1 flex-col bg-[#f8f9fa]">
            
            {activeConvData ? (
              <>
                {/* Chat Header */}
                <div className="h-20 px-6 border-b border-gray-200 bg-white flex justify-between items-center">
                  <div className="flex items-center gap-4">
                    <div className="w-12 h-12 rounded-full bg-[#E8701A] flex items-center justify-center text-white font-bold text-lg">
                      {getOtherPartyName(activeConvData)?.charAt(0) || 'U'}
                    </div>
                    <div>
                      <h2 className="text-lg font-bold text-[#0a1c3a]">{getOtherPartyName(activeConvData)}</h2>
                      <div className="flex items-center text-xs text-gray-500 mt-0.5 gap-3">
                        <span className="flex items-center"><Building2 className="w-3 h-3 mr-1"/> Requirement: {activeConvData.requirement?.title}</span>
                      </div>
                    </div>
                  </div>
                  <div className="flex items-center gap-2">
                    <button className="px-4 py-2 text-sm font-semibold text-[#0a1c3a] border border-gray-200 rounded hover:bg-gray-50 transition-colors">
                      View Requirement
                    </button>
                  </div>
                </div>
                
                {/* Chat Messages */}
                <div className="flex-1 overflow-y-auto p-6 space-y-6">
                  {messages.map((msg: any) => {
                    const isMe = user && msg.sender_id === user.id;
                    return (
                      <div key={msg.id} className={`flex ${isMe ? 'justify-end' : 'justify-start'}`}>
                        <div className={`max-w-[70%] rounded-2xl px-5 py-3 shadow-sm ${isMe ? 'bg-[#0a1c3a] text-white rounded-br-none' : 'bg-white border border-gray-100 text-gray-800 rounded-bl-none'}`}>
                          <p className="text-sm leading-relaxed">{msg.message}</p>
                          <div className={`flex items-center justify-end gap-1 mt-1.5 ${isMe ? 'text-white/70' : 'text-gray-400'}`}>
                            <span className="text-[0.65rem]">{new Date(msg.created_at).toLocaleTimeString()}</span>
                            {isMe && <CheckCheck className="w-3.5 h-3.5" />}
                          </div>
                        </div>
                      </div>
                    );
                  })}
                </div>
                
                {/* Message Input */}
                <div className="p-4 bg-white border-t border-gray-200">
                  <div className="flex items-center gap-2 bg-gray-50 border border-gray-200 rounded-lg p-2 focus-within:ring-1 focus-within:ring-[#0a1c3a] focus-within:border-[#0a1c3a] transition-all shadow-sm">
                    <button className="p-2 text-gray-400 hover:text-[#0a1c3a] transition-colors rounded-full hover:bg-gray-200">
                      <Paperclip className="w-5 h-5" />
                    </button>
                    <input 
                      type="text" 
                      value={message}
                      onChange={(e) => setMessage(e.target.value)}
                      placeholder="Type your message here..." 
                      className="flex-1 bg-transparent text-sm outline-none px-2 py-1 text-gray-700"
                      onKeyDown={(e) => {
                        if (e.key === 'Enter') {
                          sendMessage();
                        }
                      }}
                    />
                    <button 
                      onClick={sendMessage}
                      className={`p-2.5 rounded-lg flex items-center justify-center transition-all shadow-sm ${message.trim() ? 'bg-[#E8701A] text-white hover:bg-[#E8701A]/90' : 'bg-gray-200 text-gray-400 cursor-not-allowed'}`}
                    >
                      <Send className="w-4 h-4 ml-0.5" />
                    </button>
                  </div>
                  <div className="text-center mt-2">
                    <p className="text-[0.65rem] text-gray-400 flex items-center justify-center gap-1">
                      <Clock className="w-3 h-3" /> Replies usually take less than 15 minutes.
                    </p>
                  </div>
                </div>
              </>
            ) : (
              <div className="flex-1 flex items-center justify-center text-gray-400 flex-col gap-4">
                <MessageSquare className="w-16 h-16 opacity-20" />
                <p>Select a conversation to start messaging</p>
              </div>
            )}
            
          </div>
        </div>
      </div>
    </div>
  );
}

// Temporary icon mock for the empty state
function MessageSquare(props: any) {
  return (
    <svg {...props} xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
      <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
    </svg>
  );
}
