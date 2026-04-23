<?php
/**
 * Interactive Registry Status Checker
 * Developed by: James P. Friday
 */
?>
<section class="status-checker-section">
    <div class="checker-container">
        <div class="checker-card">
            <div class="checker-info">
                <h2>Verify Your Marriage Certificate</h2>
                <p>Enter your Registry Application Number (RAN) to track your status or verify the authenticity of a certificate.</p>
                
                <form class="checker-form">
                    <div class="input-group">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="e.g. IMACN-2026-8849" required>
                        <button type="submit">Check Status</button>
                    </div>
                </form>
                
                <div class="checker-features">
                    <span><i class="fas fa-check-circle"></i> Instant Verification</span>
                    <span><i class="fas fa-lock"></i> Encrypted Data</span>
                    <span><i class="fas fa-print"></i> Digital PDF Export</span>
                </div>
            </div>
            <div class="checker-visual">
                <div class="floating-cert">
                    <div class="cert-line long"></div>
                    <div class="cert-line med"></div>
                    <div class="cert-line short"></div>
                    <div class="cert-stamp"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .status-checker-section { padding: 60px 20px; background: #f3f4f6; }
    .checker-container { max-width: 1100px; margin: 0 auto; }
    .checker-card { 
        background: var(--p-navy); border-radius: 30px; padding: 60px; 
        display: flex; align-items: center; gap: 50px; overflow: hidden; position: relative;
    }
    .checker-info { flex: 1.5; color: #fff; z-index: 2; }
    .checker-info h2 { font-size: 2.2rem; font-weight: 800; margin-bottom: 15px; }
    .checker-info p { opacity: 0.7; margin-bottom: 30px; font-size: 1.1rem; }

    .input-group { 
        background: #fff; padding: 8px; border-radius: 15px; 
        display: flex; align-items: center; box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }
    .input-group i { color: #9ca3af; margin: 0 15px; }
    .input-group input { 
        border: none; flex: 1; outline: none; font-size: 16px; 
        font-family: var(--font-main); padding: 10px 0;
    }
    .input-group button { 
        background: var(--m-gold); color: #fff; border: none; 
        padding: 12px 25px; border-radius: 10px; font-weight: 700; 
        cursor: pointer; transition: 0.3s;
    }
    .input-group button:hover { background: #b8962d; }

    .checker-features { display: flex; gap: 20px; margin-top: 30px; }
    .checker-features span { font-size: 13px; opacity: 0.6; display: flex; align-items: center; gap: 8px; }
    .checker-features i { color: var(--m-gold); }

    .checker-visual { flex: 1; position: relative; height: 200px; }
    .floating-cert { 
        width: 180px; height: 240px; background: #fff; border-radius: 10px; 
        position: absolute; right: 0; transform: rotate(15deg);
        padding: 20px; box-shadow: 0 20px 50px rgba(0,0,0,0.3);
        animation: float 4s ease-in-out infinite;
    }
    @keyframes float { 0%, 100% { transform: rotate(15deg) translateY(0); } 50% { transform: rotate(15deg) translateY(-20px); } }
    .cert-line { height: 8px; background: #eee; border-radius: 4px; margin-bottom: 15px; }
    .long { width: 100%; } .med { width: 70%; } .short { width: 40%; }
    .cert-stamp { width: 50px; height: 50px; border-radius: 50%; border: 4px double var(--m-gold); margin-top: 40px; margin-left: auto; }

    @media (max-width: 850px) {
        .checker-card { flex-direction: column; padding: 40px 25px; text-align: center; }
        .input-group { flex-direction: column; gap: 10px; background: transparent; box-shadow: none; padding: 0; }
        .input-group input { background: #fff; width: 100%; border-radius: 10px; padding: 15px; text-align: center; }
        .input-group button { width: 100%; }
        .checker-visual { display: none; }
    }
</style>