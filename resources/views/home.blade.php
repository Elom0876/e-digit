
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Digit — Studio Digital & IoT</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <style>
      *,
      *::before,
      *::after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      :root {
        --ink: #08090c;
        --surface: #0e1117;
        --panel: #13161e;
        --border: rgba(255, 255, 255, 0.07);
        --border-bright: rgba(255, 255, 255, 0.15);
        --text: #e8eaf0;
        --muted: #6b7280;
        --white: #ffffff;
        --web-a: #5b8ef0;
        --web-b: #8b5cf6;
        --app-a: #f59e0b;
        --app-b: #ef4444;
        --mobile-a: #10b981;
        --mobile-b: #06b6d4;
        --iot-a: #f97316;
        --iot-b: #eab308;
        --radius: 16px;
        --radius-lg: 24px;
      }

      html { scroll-behavior: smooth; }

      body {
        font-family: "Space Grotesk", sans-serif;
        background: var(--ink);
        color: var(--text);
        overflow-x: hidden;
      }

      .container {
        max-width: 1180px;
        margin: 0 auto;
        padding: 0 24px;
      }

      .tag {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        padding: 6px 14px;
        border-radius: 100px;
        border: 1px solid var(--border-bright);
        color: var(--muted);
      }

      body::before {
        content: "";
        position: fixed;
        inset: 0;
        z-index: 0;
        pointer-events: none;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 512 512' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E");
        opacity: 0.4;
      }

      header {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 100;
        padding: 0;
        border-bottom: 1px solid var(--border);
        background: rgba(8, 9, 12, 0.8);
        backdrop-filter: blur(24px);
      }

      nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        height: 64px;
      }

      .nav-logo {
        font-family: "Outfit", sans-serif;
        font-weight: 800;
        font-size: 1.25rem;
        color: var(--white);
        text-decoration: none;
        letter-spacing: -0.02em;
      }

      .nav-logo span { color: var(--web-a); }

      .nav-links {
        display: flex;
        gap: 32px;
        list-style: none;
      }

      .nav-links a {
        font-size: 0.875rem;
        color: var(--muted);
        text-decoration: none;
        transition: color 0.2s;
      }

      .nav-links a:hover { color: var(--white); }

      .nav-cta {
        background: var(--white);
        color: var(--ink);
        padding: 9px 20px;
        border-radius: 100px;
        font-size: 0.85rem;
        font-weight: 500;
        text-decoration: none;
        transition: opacity 0.2s;
      }

      .nav-cta:hover { opacity: 0.85; }

      .hero {
        min-height: 100vh;
        display: flex;
        align-items: center;
        padding-top: 64px;
        position: relative;
        overflow: hidden;
      }

      .hero-bg {
        position: absolute;
        inset: 0;
        z-index: 0;
        background:
          radial-gradient(ellipse 60% 50% at 20% 60%, rgba(91, 142, 240, 0.12) 0%, transparent 70%),
          radial-gradient(ellipse 50% 40% at 80% 30%, rgba(139, 92, 246, 0.1) 0%, transparent 70%);
      }

      .hero-grid {
        position: absolute;
        inset: 0;
        z-index: 0;
        opacity: 0.04;
        background-image:
          linear-gradient(var(--border-bright) 1px, transparent 1px),
          linear-gradient(90deg, var(--border-bright) 1px, transparent 1px);
        background-size: 60px 60px;
      }

      .hero-inner {
        position: relative;
        z-index: 1;
        display: grid;
        grid-template-columns: 1fr 1fr;
        align-items: center;
        gap: 80px;
        width: 100%;
      }

      .hero-left { padding: 80px 0; }

      .hero-eyebrow {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 28px;
      }

      .eyebrow-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--web-a);
        animation: pulse-dot 2s infinite;
      }

      @keyframes pulse-dot {
        0%, 100% { box-shadow: 0 0 0 0 rgba(91, 142, 240, 0.4); }
        50% { box-shadow: 0 0 0 8px rgba(91, 142, 240, 0); }
      }

      .hero-eyebrow span {
        font-size: 0.8rem;
        font-weight: 500;
        color: var(--muted);
        letter-spacing: 0.06em;
      }

      .hero h1 {
        font-family: "Outfit", sans-serif;
        font-weight: 800;
        font-size: clamp(2.6rem, 5vw, 4rem);
        line-height: 1.08;
        letter-spacing: -0.03em;
        color: var(--white);
        margin-bottom: 24px;
      }

      .hero h1 em {
        font-style: normal;
        color: var(--web-a);
      }

      .hero-desc {
        font-size: 1.1rem;
        line-height: 1.7;
        color: var(--muted);
        max-width: 480px;
        margin-bottom: 40px;
      }

      .hero-actions {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
      }

      .btn-primary {
        background: var(--white);
        color: var(--ink);
        padding: 13px 28px;
        border-radius: 100px;
        font-size: 0.9rem;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: transform 0.2s, opacity 0.2s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
      }

      .btn-primary:hover {
        opacity: 0.88;
        transform: translateY(-2px);
      }

      .btn-ghost {
        background: transparent;
        color: var(--text);
        padding: 13px 28px;
        border-radius: 100px;
        font-size: 0.9rem;
        font-weight: 500;
        border: 1px solid var(--border-bright);
        cursor: pointer;
        transition: background 0.2s, transform 0.2s;
        text-decoration: none;
      }

      .btn-ghost:hover {
        background: rgba(255, 255, 255, 0.06);
        transform: translateY(-2px);
      }

      .hero-right {
        position: relative;
        height: 520px;
      }

      .service-preview {
        position: absolute;
        border-radius: var(--radius);
        border: 1px solid var(--border);
        padding: 20px 24px;
        background: var(--panel);
        backdrop-filter: blur(12px);
        transition: transform 0.3s;
      }

      .service-preview:hover { transform: translateY(-4px) scale(1.01); }

      .sp-1 { top: 0; right: 0; width: 260px; animation: float1 6s ease-in-out infinite; }
      .sp-2 { top: 130px; left: 0; width: 240px; animation: float2 7s ease-in-out infinite; }
      .sp-3 { bottom: 80px; right: 20px; width: 220px; animation: float3 5s ease-in-out infinite; }
      .sp-4 { bottom: 10px; left: 30px; width: 200px; animation: float1 8s ease-in-out infinite; }

      @keyframes float1 { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-12px); } }
      @keyframes float2 { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-8px); } }
      @keyframes float3 { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-16px); } }

      .sp-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        margin-bottom: 12px;
      }

      .sp-title { font-family: "Outfit", sans-serif; font-weight: 700; font-size: 0.9rem; color: var(--white); }
      .sp-sub { font-size: 0.75rem; color: var(--muted); margin-top: 4px; }

      .sp-bar { height: 3px; border-radius: 100px; margin-top: 14px; background: var(--border); }
      .sp-bar-fill { height: 100%; border-radius: 100px; animation: bar-grow 2s ease-out forwards; }

      @keyframes bar-grow { from { width: 0; } }

      .section { padding: 120px 0; position: relative; }

      .section-header { margin-bottom: 72px; }
      .section-header.center { text-align: center; }

      .section-title {
        font-family: "Outfit", sans-serif;
        font-weight: 800;
        font-size: clamp(2rem, 4vw, 3rem);
        letter-spacing: -0.03em;
        color: var(--white);
        margin-top: 16px;
        line-height: 1.1;
      }

      .section-desc {
        font-size: 1.05rem;
        color: var(--muted);
        margin-top: 16px;
        max-width: 560px;
        line-height: 1.7;
      }

      .section-header.center .section-desc { margin: 16px auto 0; }

      #sites { background: var(--surface); }

      .sites-layout { display: grid; grid-template-columns: 1fr 1fr; gap: 64px; align-items: start; }
      .sites-left .section-desc { max-width: 420px; }

      .sites-features { display: flex; flex-direction: column; gap: 16px; margin-top: 40px; }

      .feat-item {
        display: flex;
        align-items: flex-start;
        gap: 16px;
        padding: 20px;
        border-radius: var(--radius);
        border: 1px solid var(--border);
        background: var(--panel);
        transition: border-color 0.2s, transform 0.2s;
      }

      .feat-item:hover { border-color: var(--border-bright); transform: translateX(4px); }

      .feat-icon {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
      }

      .feat-text h4 { font-weight: 600; font-size: 0.95rem; color: var(--white); }
      .feat-text p { font-size: 0.83rem; color: var(--muted); margin-top: 3px; line-height: 1.5; }

      .sites-cards { display: flex; flex-direction: column; gap: 16px; }

      .site-card {
        padding: 28px;
        border-radius: var(--radius-lg);
        border: 1px solid var(--border);
        background: var(--panel);
        position: relative;
        overflow: hidden;
        transition: transform 0.3s, border-color 0.3s;
      }

      .site-card:hover { transform: translateY(-4px); border-color: var(--border-bright); }

      .site-card::before { content: ""; position: absolute; top: 0; left: 0; right: 0; height: 1px; }
      .site-card.vitrine::before { background: linear-gradient(90deg, var(--web-a), var(--web-b)); }
      .site-card.ecom::before { background: linear-gradient(90deg, var(--app-a), var(--app-b)); }
      .site-card.custom::before { background: linear-gradient(90deg, var(--mobile-a), var(--mobile-b)); }

      .card-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px; }
      .card-title { font-family: "Outfit", sans-serif; font-weight: 700; font-size: 1rem; color: var(--white); }

      .card-badge { font-size: 11px; font-weight: 600; padding: 4px 10px; border-radius: 100px; letter-spacing: 0.06em; }
      .badge-web { background: rgba(91, 142, 240, 0.15); color: var(--web-a); }
      .badge-app { background: rgba(245, 158, 11, 0.15); color: var(--app-a); }
      .badge-mobile { background: rgba(16, 185, 129, 0.15); color: var(--mobile-a); }
      .badge-iot { background: rgba(249, 115, 22, 0.15); color: var(--iot-a); }

      .card-desc { font-size: 0.85rem; color: var(--muted); line-height: 1.6; }
      .card-price { margin-top: 16px; font-family: "Outfit", sans-serif; font-weight: 800; font-size: 1.5rem; color: var(--white); }
      .card-price span { font-size: 0.75rem; font-weight: 400; color: var(--muted); font-family: "Space Grotesk", sans-serif; }

      #webapps { background: var(--ink); }
      .webapps-layout { display: grid; grid-template-columns: 1fr 1fr; gap: 64px; align-items: start; }

      .webapp-cards { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }

      .webapp-card {
        padding: 24px;
        border-radius: var(--radius);
        border: 1px solid var(--border);
        background: var(--panel);
        transition: transform 0.3s, border-color 0.3s;
      }

      .webapp-card:hover { transform: translateY(-4px); border-color: var(--border-bright); }

      .wc-icon { font-size: 28px; margin-bottom: 14px; }
      .wc-title { font-family: "Outfit", sans-serif; font-weight: 700; font-size: 0.92rem; color: var(--white); margin-bottom: 6px; }
      .wc-desc { font-size: 0.8rem; color: var(--muted); line-height: 1.6; }

      .webapp-steps { margin-top: 40px; }
      .webapp-steps h3 { font-family: "Outfit", sans-serif; font-weight: 700; font-size: 1.05rem; color: var(--white); margin-bottom: 20px; }

      .step { display: flex; gap: 16px; align-items: flex-start; margin-bottom: 20px; }

      .step-num {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        border: 1px solid var(--border-bright);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.78rem;
        font-weight: 700;
        color: var(--muted);
        flex-shrink: 0;
      }

      .step-body h4 { font-size: 0.9rem; font-weight: 600; color: var(--white); }
      .step-body p { font-size: 0.8rem; color: var(--muted); margin-top: 2px; line-height: 1.5; }

      #mobile { background: var(--surface); }
      .mobile-layout { display: grid; grid-template-columns: 1fr 1fr; gap: 64px; align-items: center; }

      .phone-mockup {
        position: relative;
        width: 280px;
        height: 560px;
        border-radius: 40px;
        border: 8px solid rgba(255, 255, 255, 0.12);
        background: var(--panel);
        overflow: hidden;
        margin: 0 auto;
        box-shadow: 0 40px 80px rgba(0, 0, 0, 0.5), inset 0 0 0 1px rgba(255, 255, 255, 0.04);
      }

      .phone-screen { width: 100%; height: 100%; padding: 40px 16px 20px; display: flex; flex-direction: column; gap: 12px; }
      .phone-status { display: flex; justify-content: space-between; font-size: 9px; color: var(--muted); padding: 0 6px; }

      .phone-header { background: var(--ink); border-radius: 12px; padding: 14px 16px; display: flex; align-items: center; gap: 10px; }
      .phone-avatar { width: 28px; height: 28px; border-radius: 50%; background: linear-gradient(135deg, var(--mobile-a), var(--mobile-b)); }
      .phone-header-text div:first-child { font-size: 10px; font-weight: 600; color: var(--white); }
      .phone-header-text div:last-child { font-size: 9px; color: var(--muted); }

      .phone-card { background: var(--ink); border-radius: 12px; padding: 14px 16px; }
      .phone-card-label { font-size: 9px; color: var(--muted); margin-bottom: 6px; }
      .phone-card-val { font-size: 16px; font-weight: 700; color: var(--white); }
      .phone-card-sub { font-size: 9px; color: var(--mobile-a); margin-top: 2px; }

      .phone-graph { height: 40px; display: flex; align-items: flex-end; gap: 4px; }
      .ph-bar { border-radius: 3px; flex: 1; background: rgba(16, 185, 129, 0.3); }
      .ph-bar.active { background: var(--mobile-a); }

      .phone-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; }
      .ph-mini { background: var(--ink); border-radius: 10px; padding: 10px; }
      .ph-mini-label { font-size: 8px; color: var(--muted); }
      .ph-mini-val { font-size: 12px; font-weight: 700; color: var(--white); margin-top: 2px; }

      .phone-glow {
        position: absolute;
        bottom: -60px;
        left: 50%;
        transform: translateX(-50%);
        width: 200px;
        height: 120px;
        border-radius: 50%;
        background: radial-gradient(var(--mobile-a), transparent 70%);
        opacity: 0.3;
        filter: blur(20px);
      }

      .mobile-features { display: flex; flex-direction: column; gap: 20px; margin-top: 32px; }

      .mob-feat {
        padding: 20px;
        border-radius: var(--radius);
        border: 1px solid var(--border);
        background: var(--panel);
        display: flex;
        gap: 16px;
        align-items: flex-start;
        transition: border-color 0.2s;
      }

      .mob-feat:hover { border-color: rgba(16, 185, 129, 0.3); }
      .mob-feat-icon { font-size: 22px; }
      .mob-feat-title { font-weight: 600; font-size: 0.9rem; color: var(--white); }
      .mob-feat-desc { font-size: 0.8rem; color: var(--muted); margin-top: 3px; line-height: 1.5; }

      .platforms { display: flex; gap: 10px; margin-top: 32px; flex-wrap: wrap; }
      .platform-badge { padding: 8px 16px; border-radius: 100px; border: 1px solid var(--border); font-size: 0.8rem; font-weight: 500; color: var(--muted); display: flex; align-items: center; gap: 6px; }

      #iot { background: var(--ink); }
      .iot-layout { display: grid; grid-template-columns: 1fr 1fr; gap: 64px; align-items: start; }

      .iot-visual { position: relative; height: 480px; display: flex; align-items: center; justify-content: center; }

      .iot-center {
        position: relative;
        z-index: 2;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        border: 2px solid rgba(249, 115, 22, 0.5);
        background: radial-gradient(circle, rgba(249, 115, 22, 0.15), transparent);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 36px;
      }

      .iot-ring { position: absolute; border-radius: 50%; border: 1px solid rgba(249, 115, 22, 0.15); }
      .iot-ring-1 { width: 200px; height: 200px; animation: ring-pulse 3s ease-in-out infinite; }
      .iot-ring-2 { width: 300px; height: 300px; animation: ring-pulse 3s ease-in-out infinite 0.5s; }
      .iot-ring-3 { width: 400px; height: 400px; animation: ring-pulse 3s ease-in-out infinite 1s; }

      @keyframes ring-pulse {
        0%, 100% { opacity: 0.3; transform: scale(1); }
        50% { opacity: 0.8; transform: scale(1.02); }
      }

      .iot-node {
        position: absolute;
        z-index: 3;
        background: var(--panel);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 10px 14px;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.78rem;
        font-weight: 500;
        color: var(--text);
        animation: node-float 4s ease-in-out infinite;
      }

      .iot-node:nth-child(odd) { animation-direction: reverse; }
      .iot-node .nd { font-size: 16px; }
      .nd-status { width: 6px; height: 6px; border-radius: 50%; margin-left: auto; }
      .nd-status.on { background: var(--mobile-a); box-shadow: 0 0 6px var(--mobile-a); }
      .nd-status.warn { background: var(--app-a); box-shadow: 0 0 6px var(--app-a); }

      @keyframes node-float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-6px); }
      }

      .iot-features { display: flex; flex-direction: column; gap: 16px; }

      .iot-feat {
        padding: 24px;
        border-radius: var(--radius);
        border: 1px solid var(--border);
        background: var(--panel);
        transition: border-color 0.3s, transform 0.3s;
      }

      .iot-feat:hover { border-color: rgba(249, 115, 22, 0.3); transform: translateX(4px); }
      .iot-feat-header { display: flex; align-items: center; gap: 12px; margin-bottom: 8px; }
      .iot-feat-title { font-family: "Outfit", sans-serif; font-weight: 700; font-size: 0.95rem; color: var(--white); }
      .iot-feat-desc { font-size: 0.82rem; color: var(--muted); line-height: 1.6; }
      .iot-tags { display: flex; gap: 6px; flex-wrap: wrap; margin-top: 12px; }
      .iot-tag { font-size: 10px; padding: 3px 8px; border-radius: 100px; background: rgba(249, 115, 22, 0.1); color: var(--iot-a); font-weight: 600; }

      #devis { background: var(--surface); }
      .devis-wrap { max-width: 800px; margin: 0 auto; }

      .form-card {
        background: var(--panel);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        padding: 48px;
        overflow: hidden;
      }

      .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }

      .form-field { display: flex; flex-direction: column; gap: 8px; margin-bottom: 20px; }
      .form-field label { font-size: 0.82rem; font-weight: 600; color: var(--muted); letter-spacing: 0.04em; }

      .form-field textarea,
      .form-field select,
      .form-field input {
        background: var(--ink);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 13px 16px;
        color: var(--text);
        font-size: 0.9rem;
        font-family: "Space Grotesk", sans-serif;
        transition: border-color 0.2s, box-shadow 0.2s;
        resize: none;
      }

      .form-field textarea:focus,
      .form-field select:focus,
      .form-field input:focus {
        outline: none;
        border-color: rgba(91, 142, 240, 0.5);
        box-shadow: 0 0 0 3px rgba(91, 142, 240, 0.1);
      }

      .form-field select option { background: var(--ink); }

      .generate-btn {
        width: 100%;
        background: var(--white);
        color: var(--ink);
        padding: 15px;
        border: none;
        border-radius: 12px;
        font-size: 0.95rem;
        font-weight: 700;
        font-family: "Outfit", sans-serif;
        cursor: pointer;
        transition: opacity 0.2s, transform 0.2s;
        margin-top: 8px;
      }

      .generate-btn:hover { opacity: 0.9; transform: translateY(-2px); }
      .generate-btn:disabled { opacity: 0.5; cursor: not-allowed; transform: none; }

      .spinner {
        width: 20px;
        height: 20px;
        border: 2px solid rgba(8, 9, 12, 0.3);
        border-top-color: var(--ink);
        border-radius: 50%;
        animation: spin 0.7s linear infinite;
        display: inline-block;
      }

      @keyframes spin { to { transform: rotate(360deg); } }

      .result-card {
        margin-top: 32px;
        background: var(--ink);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        padding: 36px;
        display: none;
        animation: fade-up 0.4s ease;
      }

      .result-card.show { display: block; }

      @keyframes fade-up {
        from { opacity: 0; transform: translateY(16px); }
        to { opacity: 1; transform: translateY(0); }
      }

      .result-top { display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 16px; margin-bottom: 28px; }
      .result-price { font-family: "Outfit", sans-serif; font-size: 2.4rem; font-weight: 800; color: var(--white); }
      .result-price-label { font-size: 0.8rem; color: var(--muted); margin-bottom: 4px; }
      .result-meta { display: flex; gap: 12px; flex-wrap: wrap; }

      .meta-chip { padding: 8px 14px; border-radius: 100px; border: 1px solid var(--border); font-size: 0.8rem; color: var(--muted); display: flex; align-items: center; gap: 6px; }

      .features-list { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 10px; }

      .feat-chip { padding: 10px 14px; border-radius: 10px; border: 1px solid var(--border); background: var(--panel); font-size: 0.8rem; color: var(--text); }
      .feat-chip-price { font-size: 0.72rem; color: var(--muted); margin-top: 2px; }

      .result-cta { margin-top: 28px; display: flex; justify-content: center; }

      footer { padding: 60px 0 40px; border-top: 1px solid var(--border); background: var(--ink); }

      .footer-grid { display: grid; grid-template-columns: 2fr 1fr 1fr; gap: 60px; margin-bottom: 48px; }
      .footer-brand .nav-logo { display: block; margin-bottom: 16px; font-size: 1.4rem; }
      .footer-desc { font-size: 0.85rem; color: var(--muted); line-height: 1.7; max-width: 300px; }

      .footer-col h4 { font-family: "Outfit", sans-serif; font-size: 0.82rem; font-weight: 700; color: var(--white); letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 16px; }
      .footer-col ul { list-style: none; display: flex; flex-direction: column; gap: 10px; }
      .footer-col ul li a { font-size: 0.85rem; color: var(--muted); text-decoration: none; transition: color 0.2s; }
      .footer-col ul li a:hover { color: var(--white); }

      .footer-bottom { display: flex; justify-content: space-between; align-items: center; padding-top: 32px; border-top: 1px solid var(--border); }
      .footer-copy { font-size: 0.8rem; color: var(--muted); }

      @media (max-width: 900px) {
        .hero-inner, .sites-layout, .webapps-layout, .mobile-layout, .iot-layout { grid-template-columns: 1fr; }
        .hero-right { display: none; }
        .webapp-cards { grid-template-columns: 1fr 1fr; }
        .footer-grid { grid-template-columns: 1fr; gap: 40px; }
        .form-row { grid-template-columns: 1fr; }
        .nav-links, .nav-cta { display: none; }
      }

      @media (max-width: 600px) {
        .webapp-cards { grid-template-columns: 1fr; }
        .form-card { padding: 28px 20px; }
        .hero h1 { font-size: 2.2rem; }
      }
    </style>
  </head>
  <body>
    <!-- HEADER -->
    <header>
      <nav class="container">
        <a href="#home" class="nav-logo">E<span>-Digit</span></a>
        <ul class="nav-links">
          <li><a href="#sites">Sites Web</a></li>
          <li><a href="#webapps">Apps Web</a></li>
          <li><a href="#mobile">Mobile</a></li>
          <li><a href="#iot">IoT</a></li>
          <li><a href="#devis">Devis</a></li>
        </ul>
        <!-- Bouton navbar -->
                    @auth
    <a href="{{ Auth::user()->is_admin ? route('admin.dashboard') : route('client.dashboard') }}" class="nav-cta">Mon espace</a>
@else
    <a href="{{ route('register') }}" class="nav-cta">Démarrer un projet</a>
@endauth
              </nav>
    </header>

    <!-- HERO -->
    <section class="hero" id="home">
      <div class="hero-bg"></div>
      <div class="hero-grid"></div>
      <div class="container" style="position: relative; z-index: 1; width: 100%">
        <div class="hero-inner">
          <div class="hero-left">
            <div class="hero-eyebrow">
              <div class="eyebrow-dot"></div>
              <span>Studio Digital basé au Bénin • DEKADJEVI Elom Pierre-Marie</span>
            </div>
            <h1>Nous donnons vie à vos projets <em>digitaux</em></h1>
            <p class="hero-desc">
              Sites web, applications web & mobile, solutions IoT sur mesure. De
              l'idée au déploiement, nous construisons avec vous.
            </p>
            <div class="hero-actions">
              <a href="{{ route('register') }}" class="btn-primary">Démarrer un projet →</a>
<a href="#sites" class="btn-ghost">Découvrir nos services</a>
            </div>
          </div>
          <div class="hero-right">
            <div class="service-preview sp-1">
              <div class="sp-icon" style="background: rgba(91, 142, 240, 0.12)">🌐</div>
              <div class="sp-title">Site Vitrine</div>
              <div class="sp-sub">Design moderne & responsive</div>
              <div class="sp-bar">
                <div class="sp-bar-fill" style="width: 85%; background: linear-gradient(90deg, var(--web-a), var(--web-b));"></div>
              </div>
            </div>
            <div class="service-preview sp-2">
              <div class="sp-icon" style="background: rgba(245, 158, 11, 0.12)">⚙️</div>
              <div class="sp-title">App Web SaaS</div>
              <div class="sp-sub">Dashboard & backend robuste</div>
              <div class="sp-bar">
                <div class="sp-bar-fill" style="width: 72%; background: linear-gradient(90deg, var(--app-a), var(--app-b));"></div>
              </div>
            </div>
            <div class="service-preview sp-3">
              <div class="sp-icon" style="background: rgba(16, 185, 129, 0.12)">📱</div>
              <div class="sp-title">App Mobile</div>
              <div class="sp-sub">iOS & Android natif/hybride</div>
              <div class="sp-bar">
                <div class="sp-bar-fill" style="width: 68%; background: linear-gradient(90deg, var(--mobile-a), var(--mobile-b));"></div>
              </div>
            </div>
            <div class="service-preview sp-4">
              <div class="sp-icon" style="background: rgba(249, 115, 22, 0.12)">📡</div>
              <div class="sp-title">Solution IoT</div>
              <div class="sp-sub">Monitoring temps réel</div>
              <div class="sp-bar">
                <div class="sp-bar-fill" style="width: 90%; background: linear-gradient(90deg, var(--iot-a), var(--iot-b));"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SITES WEB -->
    <section class="section" id="sites">
      <div class="container">
        <div class="sites-layout">
          <div class="sites-left">
            <div class="section-header">
              <span class="tag" style="border-color: rgba(91, 142, 240, 0.3); color: var(--web-a)">01 — Sites Web</span>
              <h2 class="section-title">Votre présence en ligne,<br />au niveau supérieur</h2>
              <p class="section-desc">Des sites vitrine élégants aux boutiques e-commerce performantes, nous créons des expériences web qui convertissent.</p>
            </div>
            <div class="sites-features">
              <div class="feat-item">
                <div class="feat-icon" style="background: rgba(91, 142, 240, 0.1)">🎨</div>
                <div class="feat-text">
                  <h4>Design sur mesure</h4>
                  <p>Chaque site est unique, conçu pour refléter l'identité de votre marque.</p>
                </div>
              </div>
              <div class="feat-item">
                <div class="feat-icon" style="background: rgba(139, 92, 246, 0.1)">📱</div>
                <div class="feat-text">
                  <h4>100% Responsive</h4>
                  <p>Expérience parfaite sur tous les appareils, du mobile au desktop.</p>
                </div>
              </div>
              <div class="feat-item">
                <div class="feat-icon" style="background: rgba(16, 185, 129, 0.1)">🚀</div>
                <div class="feat-text">
                  <h4>SEO & Performance</h4>
                  <p>Optimisé pour les moteurs de recherche et chargement ultra-rapide.</p>
                </div>
              </div>
              <div class="feat-item">
                <div class="feat-icon" style="background: rgba(245, 158, 11, 0.1)">💳</div>
                <div class="feat-text">
                  <h4>Paiement Mobile Money</h4>
                  <p>Intégration MTN, Moov et autres solutions de paiement africaines.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="sites-cards">
            <div class="site-card vitrine">
              <div class="card-header">
                <span class="card-title">Site Vitrine</span>
                <span class="card-badge badge-web">WEB</span>
              </div>
              <p class="card-desc">Présentation professionnelle de votre activité, portfolio, pages de services avec formulaire de contact.</p>
              <div class="card-price">À partir de 100 000 <span>FCFA</span></div>
            </div>
            <div class="site-card ecom">
              <div class="card-header">
                <span class="card-title">E-commerce</span>
                <span class="card-badge badge-app">COMMERCE</span>
              </div>
              <p class="card-desc">Boutique en ligne complète avec gestion des stocks, commandes, paiements et livraisons.</p>
              <div class="card-price">À partir de 200 000 <span>FCFA</span></div>
            </div>
            <div class="site-card custom">
              <div class="card-header">
                <span class="card-title">Site sur mesure</span>
                <span class="card-badge badge-mobile">CUSTOM</span>
              </div>
              <p class="card-desc">Fonctionnalités avancées, intégrations API, espaces membres, multilingue, portails clients.</p>
              <div class="card-price">Sur devis</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- APPLICATIONS WEB -->
    <section class="section" id="webapps">
      <div class="container">
        <div class="webapps-layout">
          <div>
            <div class="section-header">
              <span class="tag" style="border-color: rgba(245, 158, 11, 0.3); color: var(--app-a)">02 — Applications Web</span>
              <h2 class="section-title">Des outils métier puissants,<br />accessibles en ligne</h2>
              <p class="section-desc">Nous développons des applications web complexes — CRM, ERP, SaaS, dashboards — avec des architectures robustes et scalables.</p>
            </div>
            <div class="webapp-cards">
              <div class="webapp-card">
                <div class="wc-icon">📊</div>
                <div class="wc-title">Dashboards & Analytics</div>
                <div class="wc-desc">Visualisation de données en temps réel pour piloter votre activité.</div>
              </div>
              <div class="webapp-card">
                <div class="wc-icon">🏢</div>
                <div class="wc-title">CRM / ERP</div>
                <div class="wc-desc">Gestion clients, stocks, RH et processus métier centralisés.</div>
              </div>
              <div class="webapp-card">
                <div class="wc-icon">🔐</div>
                <div class="wc-title">Plateformes SaaS</div>
                <div class="wc-desc">Applications multi-tenant avec authentification et abonnements.</div>
              </div>
              <div class="webapp-card">
                <div class="wc-icon">🤝</div>
                <div class="wc-title">Portails Clients</div>
                <div class="wc-desc">Espaces sécurisés avec gestion de projets et documents.</div>
              </div>
              <div class="webapp-card">
                <div class="wc-icon">🔗</div>
                <div class="wc-title">API REST & Intégrations</div>
                <div class="wc-desc">Connexion à des services tiers, automatisation de flux.</div>
              </div>
              <div class="webapp-card">
                <div class="wc-icon">🤖</div>
                <div class="wc-title">IA & Automatisation</div>
                <div class="wc-desc">Intégration de chatbots, recommandations et workflows automatisés.</div>
              </div>
            </div>
          </div>
          <div>
            <div class="webapp-steps">
              <h3>Notre processus</h3>
              <div class="step">
                <div class="step-num">01</div>
                <div class="step-body">
                  <h4>Cadrage & Spécifications</h4>
                  <p>Analyse de vos besoins, définition du cahier des charges et architecture technique.</p>
                </div>
              </div>
              <div class="step">
                <div class="step-num">02</div>
                <div class="step-body">
                  <h4>Design UX/UI</h4>
                  <p>Maquettes wireframes, prototypes interactifs validés avec vous avant développement.</p>
                </div>
              </div>
              <div class="step">
                <div class="step-num">03</div>
                <div class="step-body">
                  <h4>Développement Agile</h4>
                  <p>Sprints courts avec démos régulières. Stack moderne Laravel, React, PostgreSQL.</p>
                </div>
              </div>
              <div class="step">
                <div class="step-num">04</div>
                <div class="step-body">
                  <h4>Tests & Déploiement</h4>
                  <p>Tests exhaustifs, mise en production sécurisée, formation et documentation.</p>
                </div>
              </div>
              <div class="step">
                <div class="step-num">05</div>
                <div class="step-body">
                  <h4>Maintenance & Support</h4>
                  <p>Suivi post-lancement, mises à jour, monitoring et support réactif.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- APPLICATIONS MOBILE -->
    <section class="section" id="mobile">
      <div class="container">
        <div class="mobile-layout">
          <div>
            <div class="section-header">
              <span class="tag" style="border-color: rgba(16, 185, 129, 0.3); color: var(--mobile-a)">03 — Applications Mobile</span>
              <h2 class="section-title">Vos utilisateurs dans<br />la poche de vos clients</h2>
              <p class="section-desc">Applications iOS et Android natives ou hybrides, performantes, intuitives et prêtes pour les stores.</p>
            </div>
            <div class="mobile-features">
              <div class="mob-feat">
                <div class="mob-feat-icon">⚡</div>
                <div>
                  <div class="mob-feat-title">React Native & Flutter</div>
                  <div class="mob-feat-desc">Un seul code pour iOS et Android. Performances natives à moindre coût.</div>
                </div>
              </div>
              <div class="mob-feat">
                <div class="mob-feat-icon">🔔</div>
                <div>
                  <div class="mob-feat-title">Notifications Push</div>
                  <div class="mob-feat-desc">Engagement utilisateurs avec notifications ciblées et alertes temps réel.</div>
                </div>
              </div>
              <div class="mob-feat">
                <div class="mob-feat-icon">📍</div>
                <div>
                  <div class="mob-feat-title">Géolocalisation & Cartes</div>
                  <div class="mob-feat-desc">Livraison, suivi en temps réel, points d'intérêt et navigation intégrée.</div>
                </div>
              </div>
              <div class="mob-feat">
                <div class="mob-feat-icon">💰</div>
                <div>
                  <div class="mob-feat-title">Paiement intégré</div>
                  <div class="mob-feat-desc">Mobile Money (MTN, Moov), Stripe, et autres passerelles de paiement.</div>
                </div>
              </div>
            </div>
            <div class="platforms">
              <div class="platform-badge">🍎 iOS</div>
              <div class="platform-badge">🤖 Android</div>
              <div class="platform-badge">⚛️ React Native</div>
              <div class="platform-badge">💙 Flutter</div>
              <div class="platform-badge">📦 App Store</div>
              <div class="platform-badge">▶️ Play Store</div>
            </div>
          </div>
          <div>
            <div class="phone-mockup">
              <div class="phone-screen">
                <div class="phone-status"><span>09:41</span><span>●●●</span></div>
                <div class="phone-header">
                  <div class="phone-avatar"></div>
                  <div class="phone-header-text">
                    <div>Bonjour, Kofi 👋</div>
                    <div>Tableau de bord</div>
                  </div>
                </div>
                <div class="phone-card">
                  <div class="phone-card-label">REVENUS DU MOIS</div>
                  <div class="phone-card-val">1 240 000 F</div>
                  <div class="phone-card-sub">↑ +18% vs mois dernier</div>
                </div>
                <div class="phone-card">
                  <div class="phone-card-label">ACTIVITÉ (7 JOURS)</div>
                  <div class="phone-graph">
                    <div class="ph-bar" style="height: 40%"></div>
                    <div class="ph-bar" style="height: 65%"></div>
                    <div class="ph-bar" style="height: 50%"></div>
                    <div class="ph-bar active" style="height: 90%"></div>
                    <div class="ph-bar" style="height: 70%"></div>
                    <div class="ph-bar" style="height: 80%"></div>
                    <div class="ph-bar active" style="height: 100%"></div>
                  </div>
                </div>
                <div class="phone-grid">
                  <div class="ph-mini">
                    <div class="ph-mini-label">COMMANDES</div>
                    <div class="ph-mini-val">347</div>
                  </div>
                  <div class="ph-mini">
                    <div class="ph-mini-label">CLIENTS</div>
                    <div class="ph-mini-val">1.2k</div>
                  </div>
                </div>
              </div>
              <div class="phone-glow"></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- IOT -->
    <section class="section" id="iot">
      <div class="container">
        <div class="iot-layout">
          <div class="iot-visual">
            <div class="iot-ring iot-ring-3"></div>
            <div class="iot-ring iot-ring-2"></div>
            <div class="iot-ring iot-ring-1"></div>
            <div class="iot-center">📡</div>
            <div class="iot-node" style="top: 60px; right: 60px">
              <span class="nd">🌡️</span> Capteur Temp.
              <div class="nd-status on"></div>
            </div>
            <div class="iot-node" style="top: 160px; left: 20px">
              <span class="nd">💡</span> Éclairage
              <div class="nd-status on"></div>
            </div>
            <div class="iot-node" style="bottom: 130px; right: 30px">
              <span class="nd">🚪</span> Accès
              <div class="nd-status warn"></div>
            </div>
            <div class="iot-node" style="bottom: 70px; left: 50px">
              <span class="nd">📊</span> Moniteur
              <div class="nd-status on"></div>
            </div>
            <div class="iot-node" style="top: 280px; right: 0px">
              <span class="nd">⚡</span> Énergie
              <div class="nd-status on"></div>
            </div>
          </div>
          <div>
            <div class="section-header">
              <span class="tag" style="border-color: rgba(249, 115, 22, 0.3); color: var(--iot-a)">04 — Solutions IoT</span>
              <h2 class="section-title">Connectez le monde<br />physique au digital</h2>
              <p class="section-desc">Domotique, monitoring industriel, agriculture intelligente, contrôle à distance — nous construisons des solutions IoT complètes de l'hardware à l'interface.</p>
            </div>
            <div class="iot-features">
              <div class="iot-feat">
                <div class="iot-feat-header">
                  <span style="font-size: 20px">🏭</span>
                  <div class="iot-feat-title">Monitoring Industriel</div>
                </div>
                <p class="iot-feat-desc">Surveillance en temps réel de machines, températures, pressions et alertes automatiques via SMS/WhatsApp.</p>
                <div class="iot-tags">
                  <span class="iot-tag">MQTT</span>
                  <span class="iot-tag">InfluxDB</span>
                  <span class="iot-tag">Grafana</span>
                </div>
              </div>
              <div class="iot-feat">
                <div class="iot-feat-header">
                  <span style="font-size: 20px">🏠</span>
                  <div class="iot-feat-title">Domotique & Smart Home</div>
                </div>
                <p class="iot-feat-desc">Automatisation du domicile ou bureau — éclairage, sécurité, climatisation, portails connectés.</p>
                <div class="iot-tags">
                  <span class="iot-tag">ESP32</span>
                  <span class="iot-tag">Raspberry Pi</span>
                  <span class="iot-tag">Home Assistant</span>
                </div>
              </div>
              <div class="iot-feat">
                <div class="iot-feat-header">
                  <span style="font-size: 20px">🌱</span>
                  <div class="iot-feat-title">Agriculture Intelligente</div>
                </div>
                <p class="iot-feat-desc">Capteurs d'humidité, irrigation automatisée, stations météo connectées et tableaux de bord agricoles.</p>
                <div class="iot-tags">
                  <span class="iot-tag">LoRaWAN</span>
                  <span class="iot-tag">Arduino</span>
                  <span class="iot-tag">Node-RED</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- DEVIS -->
    <section class="section" id="devis">
      <div class="container">
        <div class="section-header center">
          <span class="tag">Générateur de devis</span>
          <h2 class="section-title">Estimez votre projet<br />en 30 secondes</h2>
          <p class="section-desc">Remplissez le formulaire et obtenez une estimation instantanée de votre projet.</p>
        </div>
        <div class="devis-wrap">
          <div class="form-card">
            <div class="form-field">
              <label>DÉCRIVEZ VOTRE PROJET</label>
              <textarea id="projectDescription" rows="5" placeholder="Ex : Je souhaite une application mobile de livraison de repas avec géolocalisation, paiement Mobile Money, interface livreur et tableau de bord admin..."></textarea>
            </div>
            <div class="form-row">
              <div class="form-field">
                <label>TYPE DE SERVICE</label>
                <select id="serviceType">
                  <option value="">Sélectionnez...</option>
                  <option value="site_vitrine">🌐 Site vitrine</option>
                  <option value="ecommerce">🛍️ E-commerce</option>
                  <option value="webapp">⚙️ Application web</option>
                  <option value="mobile">📱 Application mobile</option>
                  <option value="iot">📡 Solution IoT</option>
                  <option value="fullstack">🚀 Projet full-stack</option>
                </select>
              </div>
              <div class="form-field">
                <label>DÉLAI SOUHAITÉ</label>
                <select id="urgency">
                  <option value="standard">📅 Standard (3–6 semaines)</option>
                  <option value="rapide">⚡ Rapide (1–3 semaines)</option>
                  <option value="express">🚀 Express (< 1 semaine)</option>
                </select>
              </div>
            </div>
            <a href="{{ route('register') }}" class="btn-primary">Soumettre mon projet →</a>

            <div id="resultCard" class="result-card">
              <div class="result-top">
                <div>
                  <div class="result-price-label">ESTIMATION TOTALE</div>
                  <div class="result-price" id="priceDisplay">—</div>
                </div>
                <div class="result-meta">
                  <div class="meta-chip" id="timelineChip">—</div>
                  <div class="meta-chip" id="complexityChip">—</div>
                </div>
              </div>
              <div style="font-size: 0.82rem; color: var(--muted); margin-bottom: 16px; font-weight: 600; letter-spacing: 0.06em;">
                FONCTIONNALITÉS DÉTECTÉES
              </div>
              <div class="features-list" id="featuresList"></div>
              <div class="result-cta">
                <button class="btn-primary" onclick="contactDev()">Valider & Contacter →</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- FOOTER -->
    <footer>
      <div class="container">
        <div class="footer-grid">
          <div class="footer-brand">
            <a href="#home" class="nav-logo">E<span>-Digit</span></a>
            <p class="footer-desc">
              Studio digital basé au Bénin, spécialisé dans le développement web, mobile et les solutions IoT pour l'Afrique.<br><br>
              DEKADJEVI Elom Pierre-Marie Oluwayèmi
            </p>
          </div>
          <div class="footer-col">
            <h4>Services</h4>
            <ul>
              <li><a href="#sites">Sites Web</a></li>
              <li><a href="#webapps">Applications Web</a></li>
              <li><a href="#mobile">Applications Mobile</a></li>
              <li><a href="#iot">Solutions IoT</a></li>
            </ul>
          </div>
          <div class="footer-col">
            <h4>Contact</h4>
            <ul>
              <li><a href="https://wa.me/2290142084196" target="_blank">📱 WhatsApp</a></li>
              <li><a href="mailto:pierredekadjevi@gmail.com">📧 Email</a></li>
              <li><a href="#devis">💼 Devis rapide</a></li>
            </ul>
          </div>
        </div>
        <div class="footer-bottom">
          <p class="footer-copy">© 2026 E-Digit. Tous droits réservés.</p>
          <p class="footer-copy">Fait avec ❤️ au Bénin 🇧🇯</p>
        </div>
      </div>
    </footer>

    <script>
      const pricing = {
        base: {
          site_vitrine: 100000,
          ecommerce: 200000,
          webapp: 250000,
          mobile: 300000,
          iot: 350000,
          fullstack: 450000,
        },
        complexity: { simple: 1, moyen: 1.5, complexe: 2, tres_complexe: 3 },
        urgency: { standard: 1, rapide: 1.4, express: 2 },
        features: {
          "e-commerce": { label: "🛒 E-commerce", price: 80000 },
          paiement: { label: "💳 Paiement en ligne", price: 50000 },
          reservation: { label: "📅 Réservation", price: 40000 },
          geolocalisation: { label: "📍 Géolocalisation", price: 45000 },
          multilingue: { label: "🌐 Multi-langues", price: 30000 },
          dashboard: { label: "📊 Dashboard admin", price: 60000 },
          api: { label: "🔗 API / Intégrations", price: 45000 },
          iot: { label: "📡 Fonctionnalités IoT", price: 120000 },
          ai: { label: "🤖 IA / Chatbot", price: 100000 },
          notifications: { label: "🔔 Notifications push", price: 25000 },
          livraison: { label: "🚴 Suivi livraison", price: 55000 },
        },
      };

      function analyzeComplexity(desc) {
        desc = desc.toLowerCase();
        const map = {
          simple: ["vitrine", "présentation", "contact", "simple"],
          moyen: ["formulaire", "galerie", "blog", "menu", "actualités"],
          complexe: ["e-commerce", "paiement", "compte", "réservation", "commande", "utilisateur"],
          tres_complexe: ["iot", "api", "intelligence artificielle", "dashboard", "temps réel", "machine learning", "capteur"],
        };
        let s = { simple: 0, moyen: 0, complexe: 0, tres_complexe: 0 };
        for (let l in map) map[l].forEach((k) => { if (desc.includes(k)) s[l]++; });
        if (s.tres_complexe >= 1) return "tres_complexe";
        if (s.complexe >= 2) return "complexe";
        if (s.moyen >= 2) return "moyen";
        return "simple";
      }

      function detectFeatures(desc) {
        desc = desc.toLowerCase();
        const map = {
          "e-commerce": ["boutique", "vente", "produit", "panier", "achat"],
          paiement: ["paiement", "mobile money", "carte", "transaction", "mtn", "moov"],
          reservation: ["réservation", "booking", "rdv", "rendez-vous"],
          geolocalisation: ["géolocalisation", "localisation", "carte", "maps", "livraison"],
          multilingue: ["multilingue", "plusieurs langues", "français", "anglais"],
          dashboard: ["dashboard", "tableau de bord", "admin", "gestion", "backoffice"],
          api: ["api", "intégration", "connecter", "synchroniser"],
          iot: ["iot", "connecté", "capteur", "automatique", "domotique", "arduino", "raspberry"],
          ai: ["intelligence artificielle", "ia", "chatbot", "ml", "machine learning"],
          notifications: ["notification", "push", "alerte", "sms", "whatsapp"],
          livraison: ["livraison", "livreur", "tracking", "suivi"],
        };
        return Object.keys(map).filter((f) => map[f].some((k) => desc.includes(k)));
      }

      function calcTimeline(complexity, urgency, features) {
        let days = { simple: 5, moyen: 14, complexe: 21, tres_complexe: 35 }[complexity];
        days += features.length * 2;
        if (urgency === "rapide") days = Math.ceil(days * 0.65);
        if (urgency === "express") days = Math.ceil(days * 0.4);
        return days;
      }

      async function generateQuote() {
        const desc = document.getElementById("projectDescription").value.trim();
        const service = document.getElementById("serviceType").value;
        const urgency = document.getElementById("urgency").value;
        const btn = document.getElementById("genBtn");
        if (!desc) { alert("⚠️ Décrivez votre projet pour obtenir une estimation."); return; }
        btn.disabled = true;
        btn.innerHTML = '<span class="spinner"></span>';
        await new Promise((r) => setTimeout(r, 1800));
        const complexity = analyzeComplexity(desc);
        const features = detectFeatures(desc);
        const base = pricing.base[service] || 150000;
        const cm = pricing.complexity[complexity];
        const um = pricing.urgency[urgency];
        const featPrice = features.reduce((s, f) => s + pricing.features[f].price, 0);
        const total = Math.round((base * cm + featPrice) * um);
        const days = calcTimeline(complexity, urgency, features);
        const complexLabels = {
          simple: "⬜ Projet simple",
          moyen: "🟡 Complexité moyenne",
          complexe: "🟠 Projet complexe",
          tres_complexe: "🔴 Très complexe",
        };
        document.getElementById("priceDisplay").textContent = total.toLocaleString("fr-FR") + " FCFA";
        document.getElementById("timelineChip").textContent = `⏱ ${days} jours ouvrés`;
        document.getElementById("complexityChip").textContent = complexLabels[complexity];
        const fl = document.getElementById("featuresList");
        fl.innerHTML = features.length
          ? features.map((f) => `<div class="feat-chip"><div>${pricing.features[f].label}</div><div class="feat-chip-price">+${pricing.features[f].price.toLocaleString("fr-FR")} FCFA</div></div>`).join("")
          : `<div class="feat-chip"><div>🌐 Site web professionnel</div><div class="feat-chip-price">Inclus dans le forfait</div></div>`;
        document.getElementById("resultCard").classList.add("show");
        document.getElementById("resultCard").scrollIntoView({ behavior: "smooth", block: "nearest" });
        btn.disabled = false;
        btn.innerHTML = "Recalculer";
      }

      function contactDev() {
        const price = document.getElementById("priceDisplay").textContent;
        const timeline = document.getElementById("timelineChip").textContent;
        const desc = document.getElementById("projectDescription").value;
        const msg = `Bonjour E-Digit ! Je souhaite discuter de mon projet.\n\nEstimation : ${price}\nDélai : ${timeline}\n\nDescription :\n${desc}`;
        window.open(`https://wa.me/2290142084196?text=${encodeURIComponent(msg)}`, "_blank");
      }
    </script>
  </body>
</html>