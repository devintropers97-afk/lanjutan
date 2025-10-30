<?php
/**
 * ================================================
 * SITUNEO DIGITAL - Services Data
 * ================================================
 * Data lengkap 8 divisi layanan + harga
 * Source: contohlayanan (ChatGPT export)
 */

// 8 DIVISI LAYANAN SITUNEO DIGITAL
$services_divisions = [
    [
        'id' => 'website',
        'name' => 'Website & Pengembangan Sistem',
        'name_en' => 'Website & System Development',
        'icon' => 'bi-globe',
        'color' => '#1E5C99',
        'description' => 'Website profesional, sistem custom, e-commerce, dan aplikasi web untuk bisnis Anda',
        'description_en' => 'Professional websites, custom systems, e-commerce, and web applications for your business'
    ],
    [
        'id' => 'marketing',
        'name' => 'Digital Marketing & Traffic Growth',
        'name_en' => 'Digital Marketing & Traffic Growth',
        'icon' => 'bi-graph-up-arrow',
        'color' => '#0F3057',
        'description' => 'SEO, Google Ads, Meta Ads, manajemen sosial media, dan strategi traffic untuk meningkatkan penjualan',
        'description_en' => 'SEO, Google Ads, Meta Ads, social media management, and traffic strategies to boost sales'
    ],
    [
        'id' => 'ai',
        'name' => 'Otomasi & Sistem AI',
        'name_en' => 'Automation & AI Systems',
        'icon' => 'bi-robot',
        'color' => '#FFB400',
        'description' => 'Chatbot AI, CRM, WhatsApp Blast, otomasi email, dan sistem bisnis pintar untuk efisiensi maksimal',
        'description_en' => 'AI Chatbot, CRM, WhatsApp Blast, email automation, and smart business systems for maximum efficiency'
    ],
    [
        'id' => 'branding',
        'name' => 'Branding & Desain Kreatif',
        'name_en' => 'Branding & Creative Design',
        'icon' => 'bi-palette',
        'color' => '#FFD700',
        'description' => 'Logo, brand identity, desain kemasan, company profile, dan visual branding profesional',
        'description_en' => 'Logo, brand identity, packaging design, company profile, and professional visual branding'
    ],
    [
        'id' => 'content',
        'name' => 'Konten & Copywriting',
        'name_en' => 'Content & Copywriting',
        'icon' => 'bi-file-text',
        'color' => '#1E5C99',
        'description' => 'Artikel SEO, copywriting iklan, caption sosmed, deskripsi produk, dan strategi konten',
        'description_en' => 'SEO articles, ad copywriting, social media captions, product descriptions, and content strategy'
    ],
    [
        'id' => 'analytics',
        'name' => 'Data, Analitik & Optimasi',
        'name_en' => 'Data, Analytics & Optimization',
        'icon' => 'bi-bar-chart-line',
        'color' => '#0F3057',
        'description' => 'Google Analytics, tracking konversi, dashboard bisnis, A/B testing, dan analisis prediktif',
        'description_en' => 'Google Analytics, conversion tracking, business dashboard, A/B testing, and predictive analysis'
    ],
    [
        'id' => 'infrastructure',
        'name' => 'Legalitas, Domain & Infrastruktur',
        'name_en' => 'Legal, Domain & Infrastructure',
        'icon' => 'bi-shield-check',
        'color' => '#FFB400',
        'description' => 'Domain, hosting, SSL, email bisnis, keamanan server, NIB, dan legalitas bisnis digital',
        'description_en' => 'Domain, hosting, SSL, business email, server security, business license, and digital business legality'
    ],
    [
        'id' => 'customer-experience',
        'name' => 'Layanan Klien & Pengalaman Pelanggan',
        'name_en' => 'Client Service & Customer Experience',
        'icon' => 'bi-headset',
        'color' => '#FFD700',
        'description' => 'Customer support, chatbot layanan, sistem tiket, konsultasi bisnis, dan program loyalitas',
        'description_en' => 'Customer support, service chatbot, ticketing system, business consultation, and loyalty programs'
    ]
];

// DATA LENGKAP SEMUA LAYANAN (107 layanan)
$all_services = [
    // DIVISI 1: WEBSITE & PENGEMBANGAN SISTEM
    'website' => [
        'division_name' => 'Website & Pengembangan Sistem',
        'services' => [
            [
                'name' => 'Halaman Arahan / Profil Perusahaan (1 halaman)',
                'name_en' => 'Landing Page / Company Profile (1 page)',
                'price_setup' => 350000,
                'price_monthly' => 150000,
                'type' => 'recurring',
                'features' => ['Desain responsif', 'SEO dasar', 'SSL & keamanan', 'Domain + Hosting', 'WhatsApp integration', 'Email bisnis']
            ],
            [
                'name' => 'Situs Web Multi Halaman (4-6 halaman)',
                'name_en' => 'Multi-Page Website (4-6 pages)',
                'price_setup' => 750000,
                'price_monthly' => 250000,
                'type' => 'recurring',
                'features' => ['4-6 halaman custom', 'Desain responsif', 'SEO dasar', 'Google Maps', 'Integrasi media sosial', 'Maintenance']
            ],
            [
                'name' => 'Situs Web Toko Online (E-Commerce)',
                'name_en' => 'E-Commerce Website',
                'price_setup' => 1500000,
                'price_monthly' => 350000,
                'type' => 'recurring',
                'features' => ['Katalog produk unlimited', 'Keranjang belanja', 'Sistem pembayaran', 'Manajemen order', 'Dashboard admin']
            ],
            [
                'name' => 'Website Custom / Sistem Web App',
                'name_en' => 'Custom Website / Web App System',
                'price_setup' => 2000000,
                'price_monthly' => 500000,
                'type' => 'recurring',
                'features' => ['Custom development', 'Database complex', 'User management', 'API integration', 'Scalable architecture']
            ],
            [
                'name' => 'Website Sekolah / Lembaga / Yayasan',
                'name_en' => 'School / Institution / Foundation Website',
                'price_setup' => 1200000,
                'price_monthly' => 400000,
                'type' => 'recurring',
                'features' => ['Portal berita', 'Galeri foto/video', 'Profil pengajar', 'Sistem pengumuman', 'Formulir kontak']
            ],
            [
                'name' => 'Portofolio / Personal Branding Website',
                'name_en' => 'Portfolio / Personal Branding Website',
                'price_setup' => 700000,
                'price_monthly' => 200000,
                'type' => 'recurring',
                'features' => ['Showcase portfolio', 'About me page', 'Contact form', 'Blog (optional)', 'Resume/CV section']
            ],
            [
                'name' => 'Website AI & Otomasi Bisnis',
                'name_en' => 'AI & Business Automation Website',
                'price_setup' => 2500000,
                'price_monthly' => 450000,
                'type' => 'recurring',
                'features' => ['AI chatbot integration', 'Automation workflows', 'Smart dashboard', 'Predictive analytics', 'API connections']
            ],
            [
                'name' => 'Optimasi Kecepatan Website',
                'name_en' => 'Website Speed Optimization',
                'price_setup' => 200000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Image optimization', 'Cache setup', 'Code minification', 'CDN integration', 'Performance audit']
            ],
            [
                'name' => 'Pengaturan SSL & Keamanan Firewall',
                'name_en' => 'SSL & Firewall Security Setup',
                'price_setup' => 150000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['SSL certificate', 'Firewall protection', 'Malware protection', 'Security headers', 'DDoS protection']
            ],
            [
                'name' => 'Spesialis SEO (Premium)',
                'name_en' => 'SEO Specialist (Premium)',
                'price_setup' => 0,
                'price_monthly' => 600000,
                'type' => 'monthly',
                'features' => ['Keyword research', 'On-page optimization', 'Backlink building', 'Technical SEO', 'Monthly reports']
            ],
            [
                'name' => 'Google My Business Optimasi Lokal',
                'name_en' => 'Google My Business Local Optimization',
                'price_setup' => 250000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['GMB setup', 'Local SEO', 'Review management', 'Business info optimization', 'Photo optimization']
            ],
            [
                'name' => 'Gateway Pembayaran (Integrasi)',
                'name_en' => 'Payment Gateway (Integration)',
                'price_setup' => 250000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Payment gateway setup', 'Multiple payment methods', 'Transaction security', 'Auto confirmation', 'Admin dashboard']
            ],
            [
                'name' => 'Chatbot WhatsApp / Chatbot AI',
                'name_en' => 'WhatsApp Chatbot / AI Chatbot',
                'price_setup' => 0,
                'price_monthly' => 200000,
                'type' => 'monthly',
                'features' => ['Auto reply', 'Smart responses', '24/7 availability', 'Lead capture', 'Integration with CRM']
            ],
            [
                'name' => 'Dasbor Admin / Klien / Penjualan',
                'name_en' => 'Admin / Client / Sales Dashboard',
                'price_setup' => 500000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Custom dashboard', 'Real-time data', 'User management', 'Reports & analytics', 'Mobile responsive']
            ],
            [
                'name' => 'Sistem CRM Pelanggan',
                'name_en' => 'Customer CRM System',
                'price_setup' => 400000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Contact management', 'Lead tracking', 'Sales pipeline', 'Activity history', 'Email integration']
            ]
        ],
        'packages' => [
            [
                'name' => 'Startup Go Digital',
                'name_en' => 'Startup Go Digital',
                'price' => 200000,
                'period' => 'monthly',
                'items' => ['Website Dasar', 'Domain', 'SEO Dasar', 'WhatsApp Link']
            ],
            [
                'name' => 'Bisnis Naik Level',
                'name_en' => 'Business Level Up',
                'price' => 400000,
                'period' => 'monthly',
                'items' => ['Website Pro', 'SEO', 'Copywriting', 'Meta Ads', 'Laporan']
            ],
            [
                'name' => 'Sistem AI Digital',
                'name_en' => 'Digital AI System',
                'price' => 600000,
                'period' => 'monthly',
                'items' => ['Website Custom', 'CRM', 'Chatbot AI', 'Marketing Reports']
            ],
            [
                'name' => 'Pertumbuhan E-Commerce',
                'name_en' => 'E-Commerce Growth',
                'price' => 500000,
                'period' => 'monthly',
                'items' => ['Toko Online', 'Payment Gateway', 'Ads', 'Maintenance']
            ]
        ]
    ],

    // DIVISI 2: DIGITAL MARKETING & TRAFFIC GROWTH
    'marketing' => [
        'division_name' => 'Digital Marketing & Traffic Growth',
        'services' => [
            [
                'name' => 'Optimasi SEO (Dasar)',
                'name_en' => 'SEO Optimization (Basic)',
                'price_setup' => 0,
                'price_monthly' => 200000,
                'type' => 'monthly',
                'features' => ['Keyword research', 'On-page SEO', 'Content optimization', 'Technical SEO', 'Monthly report']
            ],
            [
                'name' => 'Optimasi SEO (Premium)',
                'name_en' => 'SEO Optimization (Premium)',
                'price_setup' => 0,
                'price_monthly' => 600000,
                'type' => 'monthly',
                'features' => ['Advanced keyword research', 'Link building', 'Competitor analysis', 'Content strategy', 'Weekly reports']
            ],
            [
                'name' => 'Manajemen Iklan Google (Search, Display, Remarketing)',
                'name_en' => 'Google Ads Management (Search, Display, Remarketing)',
                'price_setup' => 0,
                'price_monthly' => 400000,
                'type' => 'monthly',
                'features' => ['Campaign setup', 'Ad copywriting', 'Bid optimization', 'A/B testing', 'Performance tracking']
            ],
            [
                'name' => 'Meta Ads (Facebook & Instagram)',
                'name_en' => 'Meta Ads (Facebook & Instagram)',
                'price_setup' => 0,
                'price_monthly' => 400000,
                'type' => 'monthly',
                'features' => ['Campaign strategy', 'Audience targeting', 'Creative design', 'Budget optimization', 'Conversion tracking']
            ],
            [
                'name' => 'Manajemen Iklan TikTok',
                'name_en' => 'TikTok Ads Management',
                'price_setup' => 0,
                'price_monthly' => 400000,
                'type' => 'monthly',
                'features' => ['TikTok campaign', 'Video ad creation', 'Influencer targeting', 'Spark ads', 'Analytics']
            ],
            [
                'name' => 'Google My Business (Lokal)',
                'name_en' => 'Google My Business (Local)',
                'price_setup' => 0,
                'price_monthly' => 250000,
                'type' => 'monthly',
                'features' => ['GMB optimization', 'Local SEO', 'Review management', 'Post scheduling', 'Local ranking']
            ],
            [
                'name' => 'WhatsApp Blast (Siaran Massal)',
                'name_en' => 'WhatsApp Blast (Mass Broadcast)',
                'price_setup' => 0,
                'price_monthly' => 250000,
                'type' => 'monthly',
                'features' => ['Broadcast messages', 'Contact management', 'Scheduling', 'Personalization', 'Reports']
            ],
            [
                'name' => 'Otomatisasi Pemasaran Email',
                'name_en' => 'Email Marketing Automation',
                'price_setup' => 0,
                'price_monthly' => 200000,
                'type' => 'monthly',
                'features' => ['Email campaigns', 'Automation workflows', 'Segmentation', 'A/B testing', 'Analytics']
            ],
            [
                'name' => 'Kampanye Penargetan Ulang & Pemasaran Ulang',
                'name_en' => 'Retargeting & Remarketing Campaigns',
                'price_setup' => 0,
                'price_monthly' => 300000,
                'type' => 'monthly',
                'features' => ['Pixel setup', 'Audience retargeting', 'Dynamic ads', 'Cross-platform', 'Conversion optimization']
            ],
            [
                'name' => 'Rencana Pertumbuhan Lalu Lintas',
                'name_en' => 'Traffic Growth Plan',
                'price_setup' => 0,
                'price_monthly' => 500000,
                'type' => 'monthly',
                'features' => ['Traffic strategy', 'Multi-channel approach', 'Content calendar', 'Ad campaigns', 'Growth tracking']
            ],
            [
                'name' => 'Riset Kata Kunci & Pesaing',
                'name_en' => 'Keyword & Competitor Research',
                'price_setup' => 200000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Keyword analysis', 'Competitor analysis', 'Gap analysis', 'Opportunity finding', 'Strategy report']
            ],
            [
                'name' => 'Penargetan Audiens Berbasis AI',
                'name_en' => 'AI-Based Audience Targeting',
                'price_setup' => 300000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['AI audience analysis', 'Predictive targeting', 'Lookalike audiences', 'Behavior analysis', 'Optimization']
            ],
            [
                'name' => 'Perencanaan Kampanye (3 Bulan)',
                'name_en' => 'Campaign Planning (3 Months)',
                'price_setup' => 400000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['3-month strategy', 'Campaign calendar', 'Budget allocation', 'KPI setting', 'Execution plan']
            ],
            [
                'name' => 'Kampanye Kesadaran Merek',
                'name_en' => 'Brand Awareness Campaign',
                'price_setup' => 0,
                'price_monthly' => 500000,
                'type' => 'monthly',
                'features' => ['Brand strategy', 'Multi-platform campaign', 'Creative content', 'Reach optimization', 'Brand tracking']
            ],
            [
                'name' => 'Halaman Arahan Penulisan Naskah',
                'name_en' => 'Landing Page Copywriting',
                'price_setup' => 150000,
                'price_monthly' => 0,
                'type' => 'per-page',
                'features' => ['Persuasive copy', 'Call-to-action', 'SEO optimization', 'A/B testing copy', 'Conversion focus']
            ],
            [
                'name' => 'Paket Pembuat Konten (Foto Produk, Video Reels, Caption)',
                'name_en' => 'Content Creator Package (Product Photos, Video Reels, Captions)',
                'price_setup' => 0,
                'price_monthly' => 750000,
                'type' => 'monthly',
                'features' => ['Product photography', 'Video reels', 'Caption writing', 'Editing', 'Content calendar']
            ],
            [
                'name' => 'Manajemen Media Sosial',
                'name_en' => 'Social Media Management',
                'price_setup' => 0,
                'price_monthly' => 400000,
                'type' => 'monthly',
                'features' => ['Content planning', 'Post scheduling', 'Community management', 'Growth strategy', 'Analytics']
            ],
            [
                'name' => 'Perencana Konten (Bulanan)',
                'name_en' => 'Content Planner (Monthly)',
                'price_setup' => 0,
                'price_monthly' => 200000,
                'type' => 'monthly',
                'features' => ['Content calendar', 'Topic research', 'Publishing schedule', 'Platform strategy', 'Performance tracking']
            ],
            [
                'name' => 'Iklan Banner & Desain Promosi',
                'name_en' => 'Banner Ads & Promotional Design',
                'price_setup' => 200000,
                'price_monthly' => 0,
                'type' => 'per-set',
                'features' => ['Banner design', 'Multiple sizes', 'Brand consistency', 'A/B variations', 'Source files']
            ]
        ]
    ],

    // DIVISI 3: OTOMASI & SISTEM AI
    'ai' => [
        'division_name' => 'Otomasi & Sistem AI',
        'services' => [
            [
                'name' => 'Chatbot AI (WA / Website / Instagram) - Basic',
                'name_en' => 'AI Chatbot (WA / Website / Instagram) - Basic',
                'price_setup' => 0,
                'price_monthly' => 300000,
                'type' => 'monthly',
                'features' => ['Basic AI responses', 'Auto reply', 'FAQ automation', 'Lead capture', 'Basic analytics']
            ],
            [
                'name' => 'Chatbot AI (WA / Website / Instagram) - Premium',
                'name_en' => 'AI Chatbot (WA / Website / Instagram) - Premium',
                'price_setup' => 0,
                'price_monthly' => 600000,
                'type' => 'monthly',
                'features' => ['Advanced AI', 'Natural language', 'Multi-platform', 'CRM integration', 'Advanced analytics']
            ],
            [
                'name' => 'Sistem CRM (Manajemen Hubungan Pelanggan) - Basic',
                'name_en' => 'CRM System (Customer Relationship Management) - Basic',
                'price_setup' => 500000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Contact database', 'Lead tracking', 'Basic automation', 'Email integration', 'Reports']
            ],
            [
                'name' => 'Sistem CRM (Manajemen Hubungan Pelanggan) - Custom',
                'name_en' => 'CRM System (Customer Relationship Management) - Custom',
                'price_setup' => 1000000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Custom features', 'Advanced automation', 'API integration', 'Custom reports', 'Team management']
            ],
            [
                'name' => 'WhatsApp Blast Otomatis',
                'name_en' => 'Automated WhatsApp Blast',
                'price_setup' => 0,
                'price_monthly' => 250000,
                'type' => 'monthly',
                'features' => ['Mass messaging', 'Scheduling', 'Personalization', 'Contact lists', 'Delivery reports']
            ],
            [
                'name' => 'Sistem Otomatisasi Email',
                'name_en' => 'Email Automation System',
                'price_setup' => 0,
                'price_monthly' => 200000,
                'type' => 'monthly',
                'features' => ['Automated workflows', 'Drip campaigns', 'Segmentation', 'Triggers', 'Analytics']
            ],
            [
                'name' => 'Dasbor Bisnis AI',
                'name_en' => 'AI Business Dashboard',
                'price_setup' => 750000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['AI insights', 'Predictive analytics', 'Real-time data', 'Custom metrics', 'Visual reports']
            ],
            [
                'name' => 'Integrasi Website + CRM + Chatbot',
                'name_en' => 'Website + CRM + Chatbot Integration',
                'price_setup' => 800000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Full integration', 'Data sync', 'Unified dashboard', 'API connections', 'Support']
            ],
            [
                'name' => 'Sistem Tindak Lanjut Otomatis (Lead Nurturing)',
                'name_en' => 'Automated Follow-up System (Lead Nurturing)',
                'price_setup' => 0,
                'price_monthly' => 300000,
                'type' => 'monthly',
                'features' => ['Auto follow-up', 'Lead scoring', 'Drip campaigns', 'Behavior triggers', 'Conversion tracking']
            ],
            [
                'name' => 'Otomatisasi Pemesanan / Janji Temu',
                'name_en' => 'Booking / Appointment Automation',
                'price_setup' => 250000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Online booking', 'Calendar sync', 'Auto reminders', 'Payment integration', 'Confirmation']
            ],
            [
                'name' => 'Pelatihan Asisten AI (Khusus Chatbot)',
                'name_en' => 'AI Assistant Training (Chatbot Specific)',
                'price_setup' => 250000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Custom training', 'Industry-specific', 'Response optimization', 'Testing', 'Documentation']
            ],
            [
                'name' => 'Integrasi API (Google Sheet, Website, Meta, WooCommerce, dll)',
                'name_en' => 'API Integration (Google Sheet, Website, Meta, WooCommerce, etc)',
                'price_setup' => 500000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Custom API', 'Data sync', 'Automation', 'Error handling', 'Documentation']
            ],
            [
                'name' => 'Peramalan Penjualan AI',
                'name_en' => 'AI Sales Forecasting',
                'price_setup' => 0,
                'price_monthly' => 500000,
                'type' => 'monthly',
                'features' => ['Predictive models', 'Trend analysis', 'Sales predictions', 'Risk analysis', 'Monthly reports']
            ],
            [
                'name' => 'Distribusi Prospek Otomatis',
                'name_en' => 'Automated Lead Distribution',
                'price_setup' => 0,
                'price_monthly' => 250000,
                'type' => 'monthly',
                'features' => ['Auto routing', 'Team assignment', 'Load balancing', 'Priority rules', 'Tracking']
            ],
            [
                'name' => 'Dasbor Obrolan Multi-Agen',
                'name_en' => 'Multi-Agent Chat Dashboard',
                'price_setup' => 0,
                'price_monthly' => 300000,
                'type' => 'monthly',
                'features' => ['Multi-channel', 'Team collaboration', 'Ticket management', 'Response tracking', 'Analytics']
            ],
            [
                'name' => 'Keamanan & Otomatisasi Pencadangan Data',
                'name_en' => 'Security & Data Backup Automation',
                'price_setup' => 0,
                'price_monthly' => 200000,
                'type' => 'monthly',
                'features' => ['Auto backup', 'Encryption', 'Cloud storage', 'Recovery system', 'Security monitoring']
            ]
        ],
        'packages' => [
            [
                'name' => 'Paket Pemula Otomatisasi',
                'name_en' => 'Automation Starter Package',
                'price' => 700000,
                'period' => 'monthly',
                'items' => ['Chatbot AI', 'WhatsApp Blast', 'CRM Basic']
            ],
            [
                'name' => 'Paket Bisnis Cerdas AI',
                'name_en' => 'AI Smart Business Package',
                'price' => 1200000,
                'period' => 'monthly',
                'items' => ['CRM', 'Chatbot Premium', 'Dashboard Analytics']
            ],
            [
                'name' => 'Paket Pendorong Penjualan',
                'name_en' => 'Sales Booster Package',
                'price' => 900000,
                'period' => 'monthly',
                'items' => ['Auto Follow-up', 'CRM', 'Payment Reminders']
            ],
            [
                'name' => 'Paket Otomatisasi E-Commerce',
                'name_en' => 'E-Commerce Automation Package',
                'price' => 1000000,
                'period' => 'monthly',
                'items' => ['Product Chatbot', 'Website Integration', 'Auto Invoice']
            ],
            [
                'name' => 'Paket Otomasi Perusahaan',
                'name_en' => 'Enterprise Automation Package',
                'price' => 2000000,
                'period' => 'monthly',
                'items' => ['Full AI System', 'CRM', 'Dashboard', 'API', 'Security Backup']
            ]
        ]
    ],

    // DIVISI 4: BRANDING & DESAIN KREATIF
    'branding' => [
        'division_name' => 'Branding & Desain Kreatif',
        'services' => [
            [
                'name' => 'Desain Logo (Identitas Merek) - Basic',
                'name_en' => 'Logo Design (Brand Identity) - Basic',
                'price_setup' => 250000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['2 concepts', '3 revisions', 'Source files', 'Style guide', 'Commercial license']
            ],
            [
                'name' => 'Desain Logo (Identitas Merek) - Premium',
                'name_en' => 'Logo Design (Brand Identity) - Premium',
                'price_setup' => 500000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['5 concepts', 'Unlimited revisions', 'Full branding', 'Mockups', 'Brand strategy']
            ],
            [
                'name' => 'Pedoman Merek / Buku Identitas Merek',
                'name_en' => 'Brand Guidelines / Brand Identity Book',
                'price_setup' => 800000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Full guidelines', 'Color palette', 'Typography', 'Usage rules', 'Examples']
            ],
            [
                'name' => 'Rebranding & Desain Ulang Logo Lama',
                'name_en' => 'Rebranding & Old Logo Redesign',
                'price_setup' => 350000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Logo modernization', 'Brand refresh', 'New guidelines', 'Migration support', 'Source files']
            ],
            [
                'name' => 'Desain Kartu Nama, Kop Surat, Amplop (Stationery Set)',
                'name_en' => 'Business Card, Letterhead, Envelope Design (Stationery Set)',
                'price_setup' => 325000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Business cards', 'Letterhead', 'Envelope', 'Print-ready files', 'Revisions']
            ],
            [
                'name' => 'Desain Feed & Story Instagram (Template)',
                'name_en' => 'Instagram Feed & Story Design (Templates)',
                'price_setup' => 0,
                'price_monthly' => 400000,
                'type' => 'monthly',
                'features' => ['30 templates/month', 'Brand consistency', 'Editable files', 'Story templates', 'Content calendar']
            ],
            [
                'name' => 'Desain Kemasan (Label, Kotak, Pouch)',
                'name_en' => 'Packaging Design (Label, Box, Pouch)',
                'price_setup' => 575000,
                'price_monthly' => 0,
                'type' => 'per-design',
                'features' => ['Custom design', '3D mockup', 'Print-ready', 'Dieline', 'Revisions']
            ],
            [
                'name' => 'Promosi Spanduk, Brosur, Flyer, & Poster',
                'name_en' => 'Banner, Brochure, Flyer, & Poster Promotion',
                'price_setup' => 275000,
                'price_monthly' => 0,
                'type' => 'per-design',
                'features' => ['Custom design', 'Print/digital ready', 'Multiple sizes', 'Revisions', 'Source files']
            ],
            [
                'name' => 'Desain Profil Perusahaan (PDF/Cetak)',
                'name_en' => 'Company Profile Design (PDF/Print)',
                'price_setup' => 850000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Professional layout', '8-16 pages', 'Photo editing', 'Print-ready', 'Digital version']
            ],
            [
                'name' => 'Video Reel / Promo Produk (15-60 detik)',
                'name_en' => 'Video Reel / Product Promo (15-60 sec)',
                'price_setup' => 500000,
                'price_monthly' => 0,
                'type' => 'per-video',
                'features' => ['Script writing', 'Animation', 'Music', 'Voice over (optional)', 'Revisions']
            ],
            [
                'name' => 'Panduan Suara Merek & Penulisan Naskah',
                'name_en' => 'Brand Voice Guide & Copywriting',
                'price_setup' => 200000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Tone guidelines', 'Writing examples', 'Do\'s and don\'ts', 'Messaging strategy', 'Template']
            ],
            [
                'name' => 'Produk Mockup (Pratinjau 3D)',
                'name_en' => 'Product Mockup (3D Preview)',
                'price_setup' => 150000,
                'price_monthly' => 0,
                'type' => 'per-mockup',
                'features' => ['3D visualization', 'Photo-realistic', 'Multiple angles', 'High resolution', 'Quick delivery']
            ],
            [
                'name' => 'Pemotretan Mini (5-10 foto)',
                'name_en' => 'Mini Photoshoot (5-10 photos)',
                'price_setup' => 600000,
                'price_monthly' => 0,
                'type' => 'per-session',
                'features' => ['Professional photos', 'Basic editing', 'High resolution', 'Commercial license', 'Quick turnaround']
            ],
            [
                'name' => 'Iklan Banner Digital (Google, Meta, TikTok)',
                'name_en' => 'Digital Banner Ads (Google, Meta, TikTok)',
                'price_setup' => 225000,
                'price_monthly' => 0,
                'type' => 'per-set',
                'features' => ['Multiple sizes', 'Platform optimized', 'A/B variations', 'Revisions', 'Source files']
            ],
            [
                'name' => 'Desain Merchandise (Kaos, Tote-bag, Mug)',
                'name_en' => 'Merchandise Design (T-shirt, Tote-bag, Mug)',
                'price_setup' => 325000,
                'price_monthly' => 0,
                'type' => 'per-design',
                'features' => ['Custom design', 'Print-ready', 'Mockup', 'Revisions', 'Source files']
            ],
            [
                'name' => 'Audit Merek & Analisis Posisi',
                'name_en' => 'Brand Audit & Position Analysis',
                'price_setup' => 300000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Brand analysis', 'Competitor review', 'Market position', 'Recommendations', 'Report']
            ],
            [
                'name' => 'Konsultasi Branding (Zoom, 1 jam)',
                'name_en' => 'Branding Consultation (Zoom, 1 hour)',
                'price_setup' => 150000,
                'price_monthly' => 0,
                'type' => 'per-session',
                'features' => ['1-hour session', 'Expert advice', 'Q&A', 'Action plan', 'Recording (optional)']
            ],
            [
                'name' => 'Dokumen Strategi Merek',
                'name_en' => 'Brand Strategy Document',
                'price_setup' => 500000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Strategy document', 'Target audience', 'Positioning', 'Roadmap', 'Implementation plan']
            ]
        ],
        'packages' => [
            [
                'name' => 'Paket Branding Dasar',
                'name_en' => 'Basic Branding Package',
                'price' => 400000,
                'period' => 'one-time',
                'items' => ['Logo', 'Business Card', 'Promotional Banner']
            ],
            [
                'name' => 'Kit Merek Profesional',
                'name_en' => 'Professional Brand Kit',
                'price' => 800000,
                'period' => 'one-time',
                'items' => ['Logo', 'Brand Guidelines', 'Stationery Set', 'Feed Templates']
            ],
            [
                'name' => 'Paket Identitas Perusahaan Premium',
                'name_en' => 'Premium Corporate Identity Package',
                'price' => 1500000,
                'period' => 'one-time',
                'items' => ['Logo', 'Brand Guidelines', 'Company Profile', 'Brochure', 'Mockups']
            ],
            [
                'name' => 'Paket Branding Produk',
                'name_en' => 'Product Branding Package',
                'price' => 1000000,
                'period' => 'one-time',
                'items' => ['Logo', 'Packaging', 'Banner', 'Product Catalog']
            ],
            [
                'name' => 'Paket Rebranding & Penyegaran Merek',
                'name_en' => 'Rebranding & Brand Refresh Package',
                'price' => 900000,
                'period' => 'one-time',
                'items' => ['Brand modernization', 'Visual updates', 'Content tone adjustment']
            ]
        ]
    ],

    // DIVISI 5: KONTEN & COPYWRITING
    'content' => [
        'division_name' => 'Konten & Copywriting',
        'services' => [
            [
                'name' => 'Halaman Arahan Penulisan Naskah',
                'name_en' => 'Landing Page Copywriting',
                'price_setup' => 150000,
                'price_monthly' => 0,
                'type' => 'per-page',
                'features' => ['Persuasive copy', 'SEO optimized', 'CTA focused', 'Revisions', 'Research included']
            ],
            [
                'name' => 'Artikel SEO (500-700 kata)',
                'name_en' => 'SEO Article (500-700 words)',
                'price_setup' => 75000,
                'price_monthly' => 0,
                'type' => 'per-article',
                'features' => ['Keyword research', 'SEO optimized', 'Original content', 'Plagiarism check', 'Fast delivery']
            ],
            [
                'name' => 'Artikel SEO (1000-1500 kata)',
                'name_en' => 'SEO Article (1000-1500 words)',
                'price_setup' => 120000,
                'price_monthly' => 0,
                'type' => 'per-article',
                'features' => ['In-depth research', 'Long-form SEO', 'Original content', 'Images included', 'Quality check']
            ],
            [
                'name' => 'Caption Media Sosial',
                'name_en' => 'Social Media Caption',
                'price_setup' => 10000,
                'price_monthly' => 0,
                'type' => 'per-caption',
                'features' => ['Engaging copy', 'Hashtags', 'CTA', 'Brand voice', 'Platform optimized']
            ],
            [
                'name' => 'Caption Media Sosial (Paket Bulanan 30 Caption)',
                'name_en' => 'Social Media Caption (Monthly Package 30 Captions)',
                'price_setup' => 0,
                'price_monthly' => 250000,
                'type' => 'monthly',
                'features' => ['30 captions', 'Content calendar', 'Hashtag strategy', 'Revisions', 'Scheduling tips']
            ],
            [
                'name' => 'Iklan Copywriting (Meta/Google/TikTok)',
                'name_en' => 'Ad Copywriting (Meta/Google/TikTok)',
                'price_setup' => 150000,
                'price_monthly' => 0,
                'type' => 'per-campaign',
                'features' => ['Ad headlines', 'Body copy', 'CTA', 'A/B variations', 'Platform optimized']
            ],
            [
                'name' => 'Deskripsi Produk E-commerce',
                'name_en' => 'E-commerce Product Description',
                'price_setup' => 15000,
                'price_monthly' => 0,
                'type' => 'per-product',
                'features' => ['Compelling copy', 'SEO keywords', 'Features/benefits', 'Fast delivery', 'Revisions']
            ],
            [
                'name' => 'Deskripsi Produk E-commerce (Paket 30 Produk)',
                'name_en' => 'E-commerce Product Description (30 Products Package)',
                'price_setup' => 0,
                'price_monthly' => 300000,
                'type' => 'monthly',
                'features' => ['30 product descriptions', 'Bulk discount', 'SEO optimized', 'Category organization', 'Quick turnaround']
            ],
            [
                'name' => 'Penulisan Profil Perusahaan',
                'name_en' => 'Company Profile Writing',
                'price_setup' => 450000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Professional writing', 'Research included', 'Revisions', 'Multiple sections', 'Print/digital ready']
            ],
            [
                'name' => 'Penulisan Salinan Email Promosi',
                'name_en' => 'Promotional Email Copy Writing',
                'price_setup' => 100000,
                'price_monthly' => 0,
                'type' => 'per-email',
                'features' => ['Subject line', 'Body copy', 'CTA', 'Personalization', 'A/B versions']
            ],
            [
                'name' => 'Penulisan Salinan Email Promosi (Paket 5 Email)',
                'name_en' => 'Promotional Email Copy Writing (5 Emails Package)',
                'price_setup' => 250000,
                'price_monthly' => 0,
                'type' => 'per-package',
                'features' => ['5 email copies', 'Email sequence', 'Strategy included', 'Revisions', 'Templates']
            ],
            [
                'name' => 'Riset Kata Kunci SEO',
                'name_en' => 'SEO Keyword Research',
                'price_setup' => 150000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Keyword analysis', 'Competition check', 'Search volume', 'Strategy report', 'Priority list']
            ],
            [
                'name' => 'Optimasi SEO Artikel On-Page',
                'name_en' => 'On-Page SEO Article Optimization',
                'price_setup' => 100000,
                'price_monthly' => 0,
                'type' => 'per-10-articles',
                'features' => ['Meta optimization', 'Keyword placement', 'Internal linking', 'Image alt text', 'Readability check']
            ],
            [
                'name' => 'Desain Konten Visual (Canva/Feed IG)',
                'name_en' => 'Visual Content Design (Canva/IG Feed)',
                'price_setup' => 0,
                'price_monthly' => 250000,
                'type' => 'monthly',
                'features' => ['20 designs/month', 'Brand templates', 'Editable files', 'Stock images', 'Quick delivery']
            ],
            [
                'name' => 'Optimasi Konten AI',
                'name_en' => 'AI Content Optimization',
                'price_setup' => 0,
                'price_monthly' => 100000,
                'type' => 'monthly',
                'features' => ['AI-powered editing', 'SEO enhancement', 'Readability improvement', 'Tone adjustment', 'Quality check']
            ],
            [
                'name' => 'Kalender Editorial (3 Bulan)',
                'name_en' => 'Editorial Calendar (3 Months)',
                'price_setup' => 400000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['3-month plan', 'Content topics', 'Publishing schedule', 'Platform strategy', 'Keyword mapping']
            ]
        ],
        'packages' => [
            [
                'name' => 'Paket Konten Dasar',
                'name_en' => 'Basic Content Package',
                'price' => 400000,
                'period' => 'monthly',
                'items' => ['5 SEO Articles', '10 IG Captions']
            ],
            [
                'name' => 'Paket Pertumbuhan Bisnis',
                'name_en' => 'Business Growth Package',
                'price' => 700000,
                'period' => 'monthly',
                'items' => ['10 SEO Articles', '20 Captions', 'Ad Copywriting']
            ],
            [
                'name' => 'Paket Konten Merek Lengkap',
                'name_en' => 'Complete Brand Content Package',
                'price' => 1200000,
                'period' => 'monthly',
                'items' => ['15 Articles', '30 Captions', '2 Landing Pages']
            ],
            [
                'name' => 'Paket Strategi Konten Premium',
                'name_en' => 'Premium Content Strategy Package',
                'price' => 1000000,
                'period' => 'monthly',
                'items' => ['Keyword Research', 'Planning', '10 Articles', 'Analytics Report']
            ],
            [
                'name' => 'Paket Salinan E-Commerce',
                'name_en' => 'E-Commerce Copy Package',
                'price' => 700000,
                'period' => 'monthly',
                'items' => ['50 Product Descriptions', 'Ad Copy', 'Banner Text']
            ]
        ]
    ],

    // DIVISI 6: DATA, ANALITIK & OPTIMASI
    'analytics' => [
        'division_name' => 'Data, Analitik & Optimasi',
        'services' => [
            [
                'name' => 'Setup & Pelaporan Google Analytics 4',
                'name_en' => 'Google Analytics 4 Setup & Reporting',
                'price_setup' => 250000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['GA4 installation', 'Goal tracking', 'Report setup', 'Training', 'Documentation']
            ],
            [
                'name' => 'Pelacakan Konversi (Meta Pixel, TikTok, Google Tag)',
                'name_en' => 'Conversion Tracking (Meta Pixel, TikTok, Google Tag)',
                'price_setup' => 200000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Pixel installation', 'Event setup', 'Testing', 'Documentation', 'Support']
            ],
            [
                'name' => 'Dasbor Insight Bisnis (Data Studio / Power BI)',
                'name_en' => 'Business Insight Dashboard (Data Studio / Power BI)',
                'price_setup' => 750000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Custom dashboard', 'Data integration', 'Visual reports', 'Auto-update', 'Training']
            ],
            [
                'name' => 'Analisis Bisnis AI (Prediksi, Tren)',
                'name_en' => 'AI Business Analysis (Prediction, Trends)',
                'price_setup' => 0,
                'price_monthly' => 800000,
                'type' => 'monthly',
                'features' => ['AI predictions', 'Trend analysis', 'Risk assessment', 'Recommendations', 'Monthly reports']
            ],
            [
                'name' => 'Audit Optimasi Kinerja',
                'name_en' => 'Performance Optimization Audit',
                'price_setup' => 400000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Full audit', 'Performance analysis', 'Recommendations', 'Action plan', 'Report']
            ],
            [
                'name' => 'Pengujian A/B & Optimasi Konversi',
                'name_en' => 'A/B Testing & Conversion Optimization',
                'price_setup' => 0,
                'price_monthly' => 300000,
                'type' => 'monthly',
                'features' => ['Test setup', 'Data analysis', 'Winner selection', 'Implementation', 'Reports']
            ],
            [
                'name' => 'Analisis Perilaku Pelanggan',
                'name_en' => 'Customer Behavior Analysis',
                'price_setup' => 400000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Behavior tracking', 'Pattern analysis', 'Segmentation', 'Insights', 'Report']
            ],
            [
                'name' => 'Pelacakan Corong Penjualan',
                'name_en' => 'Sales Funnel Tracking',
                'price_setup' => 300000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Funnel setup', 'Drop-off analysis', 'Conversion tracking', 'Optimization tips', 'Dashboard']
            ],
            [
                'name' => 'Peta Panas & Pemetaan Perjalanan Pengguna',
                'name_en' => 'Heatmap & User Journey Mapping',
                'price_setup' => 400000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Heatmap tool', 'Click tracking', 'Scroll tracking', 'User journey', 'Report']
            ],
            [
                'name' => 'Analisis Prediktif',
                'name_en' => 'Predictive Analysis',
                'price_setup' => 0,
                'price_monthly' => 600000,
                'type' => 'monthly',
                'features' => ['Predictive models', 'Forecasting', 'Trend prediction', 'Risk analysis', 'Reports']
            ],
            [
                'name' => 'Analisis ROI & Efisiensi Biaya',
                'name_en' => 'ROI & Cost Efficiency Analysis',
                'price_setup' => 250000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['ROI calculation', 'Cost analysis', 'Efficiency review', 'Recommendations', 'Report']
            ],
            [
                'name' => 'Optimasi SEO (Lanjutan)',
                'name_en' => 'SEO Optimization (Advanced)',
                'price_setup' => 0,
                'price_monthly' => 300000,
                'type' => 'monthly',
                'features' => ['Technical SEO', 'Content optimization', 'Link building', 'Performance tracking', 'Reports']
            ],
            [
                'name' => 'Optimasi Iklan (Meta, Google, TikTok)',
                'name_en' => 'Ad Optimization (Meta, Google, TikTok)',
                'price_setup' => 0,
                'price_monthly' => 350000,
                'type' => 'monthly',
                'features' => ['Campaign optimization', 'Bid adjustment', 'Audience refinement', 'A/B testing', 'Reports']
            ],
            [
                'name' => 'Optimasi Konversi Situs Web',
                'name_en' => 'Website Conversion Optimization',
                'price_setup' => 0,
                'price_monthly' => 400000,
                'type' => 'monthly',
                'features' => ['CRO audit', 'UX improvements', 'A/B testing', 'Implementation', 'Tracking']
            ],
            [
                'name' => 'Penganalisis Kinerja Konten AI',
                'name_en' => 'AI Content Performance Analyzer',
                'price_setup' => 0,
                'price_monthly' => 200000,
                'type' => 'monthly',
                'features' => ['AI analysis', 'Performance metrics', 'Content suggestions', 'Optimization tips', 'Reports']
            ],
            [
                'name' => 'Rencana Strategi Berbasis Data (3 Bulan)',
                'name_en' => 'Data-Based Strategy Plan (3 Months)',
                'price_setup' => 500000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Data analysis', '3-month strategy', 'Action plan', 'KPI setting', 'Roadmap']
            ]
        ],
        'packages' => [
            [
                'name' => 'Paket Pelacak Data Dasar',
                'name_en' => 'Basic Data Tracker Package',
                'price' => 500000,
                'period' => 'monthly',
                'items' => ['GA4', 'Meta Pixel', 'Reports']
            ],
            [
                'name' => 'Paket Pro Optimasi',
                'name_en' => 'Pro Optimization Package',
                'price' => 900000,
                'period' => 'monthly',
                'items' => ['Dashboard', 'SEO Audit', 'A/B Testing']
            ],
            [
                'name' => 'Paket Wawasan Bisnis AI',
                'name_en' => 'AI Business Insight Package',
                'price' => 1500000,
                'period' => 'monthly',
                'items' => ['Dashboard', 'AI Predictive', 'ROI Reports']
            ],
            [
                'name' => 'Paket Peningkat Performa',
                'name_en' => 'Performance Booster Package',
                'price' => 1000000,
                'period' => 'monthly',
                'items' => ['Full Tracking', 'Speed Audit', 'Funnel Optimization']
            ]
        ]
    ],

    // DIVISI 7: LEGALITAS, DOMAIN & INFRASTRUKTUR
    'infrastructure' => [
        'division_name' => 'Legalitas, Domain & Infrastruktur',
        'services' => [
            [
                'name' => 'Pendaftaran Domain (.com / .id / .net)',
                'name_en' => 'Domain Registration (.com / .id / .net)',
                'price_setup' => 225000,
                'price_monthly' => 0,
                'type' => 'yearly',
                'features' => ['Domain registration', 'WHOIS privacy', 'DNS management', '1 year included', 'Support']
            ],
            [
                'name' => 'Hosting Situs Web (Shared/Cloud/VPS)',
                'name_en' => 'Website Hosting (Shared/Cloud/VPS)',
                'price_setup' => 325000,
                'price_monthly' => 0,
                'type' => 'yearly',
                'features' => ['SSD storage', 'Bandwidth', 'cPanel', 'Backup', '99.9% uptime']
            ],
            [
                'name' => 'Pengaturan Sertifikat SSL (HTTPS)',
                'name_en' => 'SSL Certificate Setup (HTTPS)',
                'price_setup' => 175000,
                'price_monthly' => 0,
                'type' => 'yearly',
                'features' => ['SSL certificate', 'Installation', 'HTTPS setup', 'Auto-renewal', 'Support']
            ],
            [
                'name' => 'Manajemen & Optimasi Server',
                'name_en' => 'Server Management & Optimization',
                'price_setup' => 550000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Server setup', 'Performance tuning', 'Security hardening', 'Monitoring', 'Documentation']
            ],
            [
                'name' => 'Penerapan Cloud (AWS / Google Cloud / DigitalOcean)',
                'name_en' => 'Cloud Deployment (AWS / Google Cloud / DigitalOcean)',
                'price_setup' => 950000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Cloud setup', 'Migration', 'Configuration', 'Scaling setup', 'Training']
            ],
            [
                'name' => 'Sistem Pencadangan & Pemulihan Data',
                'name_en' => 'Data Backup & Recovery System',
                'price_setup' => 0,
                'price_monthly' => 150000,
                'type' => 'monthly',
                'features' => ['Auto backup', 'Cloud storage', 'Recovery plan', 'Testing', 'Support']
            ],
            [
                'name' => 'Email Bisnis (nama@domainkamu.com)',
                'name_en' => 'Business Email (name@yourdomain.com)',
                'price_setup' => 150000,
                'price_monthly' => 0,
                'type' => 'yearly-per-account',
                'features' => ['Professional email', 'Webmail access', 'SMTP/IMAP', 'Anti-spam', 'Support']
            ],
            [
                'name' => 'Migrasi Situs Web',
                'name_en' => 'Website Migration',
                'price_setup' => 250000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Full migration', 'Zero downtime', 'Testing', 'DNS update', 'Support']
            ],
            [
                'name' => 'Pengaturan Firewall & Anti-DDoS',
                'name_en' => 'Firewall & Anti-DDoS Setup',
                'price_setup' => 450000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Firewall config', 'DDoS protection', 'Security rules', 'Monitoring', 'Support']
            ],
            [
                'name' => 'Pemantauan Keamanan (24 jam)',
                'name_en' => 'Security Monitoring (24 hours)',
                'price_setup' => 0,
                'price_monthly' => 200000,
                'type' => 'monthly',
                'features' => ['24/7 monitoring', 'Threat detection', 'Alert system', 'Incident response', 'Reports']
            ],
            [
                'name' => 'Pembersihan Malware & Virus',
                'name_en' => 'Malware & Virus Cleanup',
                'price_setup' => 375000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Malware scan', 'Virus removal', 'Security hardening', 'Backup', 'Prevention tips']
            ],
            [
                'name' => 'Login & Perlindungan Brute Force',
                'name_en' => 'Login & Brute Force Protection',
                'price_setup' => 150000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Login security', 'Brute force protection', 'Rate limiting', 'IP blocking', 'Monitoring']
            ],
            [
                'name' => 'Audit & Penguatan Keamanan',
                'name_en' => 'Security Audit & Hardening',
                'price_setup' => 600000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Security audit', 'Vulnerability scan', 'Recommendations', 'Implementation', 'Report']
            ],
            [
                'name' => 'Pembuatan NIB (Nomor Induk Berusaha)',
                'name_en' => 'NIB (Business Identification Number) Creation',
                'price_setup' => 350000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['NIB registration', 'Document preparation', 'Submission', 'Follow-up', 'NIB certificate']
            ],
            [
                'name' => 'Legalitas Bisnis Online',
                'name_en' => 'Online Business Legality',
                'price_setup' => 750000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Business registration', 'Legal documents', 'Compliance check', 'Consultation', 'Certificate']
            ],
            [
                'name' => 'Generator Kebijakan Privasi & Ketentuan Penggunaan',
                'name_en' => 'Privacy Policy & Terms of Use Generator',
                'price_setup' => 150000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Privacy policy', 'Terms of use', 'Legal compliance', 'Custom to business', 'Editable']
            ],
            [
                'name' => 'Pendaftaran Merek Dagang (Bantuan Konsultasi)',
                'name_en' => 'Trademark Registration (Consultation Support)',
                'price_setup' => 1750000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Trademark search', 'Application prep', 'Submission support', 'Follow-up', 'Consultation']
            ],
            [
                'name' => 'Draft Perjanjian Kerja Sama / Vendor / Reseller',
                'name_en' => 'Partnership / Vendor / Reseller Agreement Draft',
                'price_setup' => 550000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Legal drafting', 'Custom terms', 'Review', 'Revisions', 'Final document']
            ],
            [
                'name' => 'Pembuatan PT / CV / Yayasan Digital',
                'name_en' => 'PT / CV / Foundation Digital Creation',
                'price_setup' => 2250000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Company setup', 'Legal documents', 'Notary', 'Registration', 'Certificate']
            ]
        ],
        'packages' => [
            [
                'name' => 'Paket Web Pemula',
                'name_en' => 'Web Starter Package',
                'price' => 350000,
                'period' => 'yearly',
                'items' => ['Domain .com', 'Basic Hosting', 'SSL']
            ],
            [
                'name' => 'Paket Web Aman',
                'name_en' => 'Secure Web Package',
                'price' => 550000,
                'period' => 'yearly',
                'items' => ['Domain .com', 'Hosting', 'SSL', 'Backup', 'Security Scan']
            ],
            [
                'name' => 'Paket Cloud Bisnis',
                'name_en' => 'Business Cloud Package',
                'price' => 900000,
                'period' => 'yearly',
                'items' => ['Domain .id', 'Cloud Hosting', 'SSL', 'Business Email', 'Firewall']
            ],
            [
                'name' => 'Paket Keamanan Pro',
                'name_en' => 'Pro Security Package',
                'price' => 600000,
                'period' => 'yearly',
                'items' => ['Firewall', 'Real-time Monitoring', 'Backup', 'Audit']
            ],
            [
                'name' => 'Paket Infrastruktur + Hukum Lengkap',
                'name_en' => 'Complete Infrastructure + Legal Package',
                'price' => 1250000,
                'period' => 'yearly',
                'items' => ['Domain', 'Hosting', 'SSL', 'NIB', 'Legal Documents']
            ]
        ]
    ],

    // DIVISI 8: LAYANAN KLIEN & PENGALAMAN PELANGGAN
    'customer-experience' => [
        'division_name' => 'Layanan Klien & Pengalaman Pelanggan',
        'services' => [
            [
                'name' => 'Pusat Dukungan Pelanggan (Sistem Obrolan & Tiket)',
                'name_en' => 'Customer Support Center (Chat & Ticket System)',
                'price_setup' => 0,
                'price_monthly' => 250000,
                'type' => 'monthly',
                'features' => ['Multi-channel support', 'Ticket system', 'Live chat', 'Knowledge base', 'Reports']
            ],
            [
                'name' => 'Chatbot Otomatis (Dukungan AI)',
                'name_en' => 'Automated Chatbot (AI Support)',
                'price_setup' => 500000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['AI chatbot', 'Auto responses', '24/7 support', 'Training', 'Integration']
            ],
            [
                'name' => 'Dukungan Purna Jual & Pemeliharaan',
                'name_en' => 'After-Sales Support & Maintenance',
                'price_setup' => 0,
                'price_monthly' => 200000,
                'type' => 'monthly',
                'features' => ['Bug fixes', 'Updates', 'Technical support', 'Priority response', 'Reports']
            ],
            [
                'name' => 'Sistem Tiket & Layanan Pelacakan Klien',
                'name_en' => 'Ticket System & Client Tracking Service',
                'price_setup' => 250000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Ticket system', 'Status tracking', 'Email notifications', 'Priority levels', 'Reports']
            ],
            [
                'name' => 'Konsultasi & Strategi Bisnis Digital (1-on-1)',
                'name_en' => 'Digital Business Consultation & Strategy (1-on-1)',
                'price_setup' => 300000,
                'price_monthly' => 0,
                'type' => 'per-session',
                'features' => ['1-hour session', 'Expert advice', 'Strategy planning', 'Action plan', 'Recording']
            ],
            [
                'name' => 'Program Orientasi Klien',
                'name_en' => 'Client Onboarding Program',
                'price_setup' => 225000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Welcome guide', 'Training', 'Setup assistance', 'Q&A session', 'Documentation']
            ],
            [
                'name' => 'Sistem Loyalitas & Penghargaan Pelanggan',
                'name_en' => 'Customer Loyalty & Reward System',
                'price_setup' => 750000,
                'price_monthly' => 0,
                'type' => 'one-time',
                'features' => ['Points system', 'Rewards program', 'Tier management', 'Auto tracking', 'Reports']
            ]
        ]
    ]
];

?>
