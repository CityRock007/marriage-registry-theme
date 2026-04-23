<?php
/**
 * Seminar & Programs Calendar - Surgically Updated & Fully Dynamic
 * Developed by: James P. Friday
 */
$show_cal = get_theme_mod('show_calendar', true);

// Surgical Color Retrieval
$cal_accent  = get_theme_mod('hero_btn_bg', '#d4af37'); // Primary Accent (Gold)
$cal_navy    = get_theme_mod('p_navy_color', '#0f172a'); // Primary Dark (Navy)

if ( $show_cal ) :
?>
<section class="calendar-section">
    <div class="section-header text-center">
        <span class="badge-gold" style="color: <?php echo esc_attr($cal_accent); ?>;"><?php esc_html_e('Upcoming Events', 'marriage-registry'); ?></span>
        <h2 class="section-title" style="color: <?php echo esc_attr($cal_navy); ?>;"><?php esc_html_e('Seminars & Programs', 'marriage-registry'); ?></h2>
        <div class="title-underline" style="background: <?php echo esc_attr($cal_accent); ?>;"></div>
    </div>

    <div class="calendar-grid">
        <?php for ( $i = 1; $i <= 3; $i++ ) : 
            $p_day   = get_theme_mod("program_day_$i", '22');
            $p_month = get_theme_mod("program_month_$i", 'APR');
            $p_title = get_theme_mod("program_title_$i", "Marriage Counseling Seminar $i");
            $p_time  = get_theme_mod("program_time_$i", '10:00 AM');
        ?>
        <div class="calendar-card" style="border-color: #f1f5f9;">
            <div class="cal-date-box" style="background: <?php echo esc_attr($cal_navy); ?>;">
                <span class="cal-day"><?php echo esc_html($p_day); ?></span>
                <span class="cal-month" style="color: <?php echo esc_attr($cal_accent); ?>;"><?php echo esc_html($p_month); ?></span>
            </div>
            <div class="cal-details">
                <div class="cal-meta"><i class="far fa-clock"></i> <?php echo esc_html($p_time); ?></div>
                <h3 style="color: <?php echo esc_attr($cal_navy); ?>;"><?php echo esc_html($p_title); ?></h3>
                <a href="javascript:void(0)" class="cal-link open-program-modal" 
                   data-program="<?php echo esc_attr($p_title); ?>"
                   style="color: <?php echo esc_attr($cal_accent); ?>;">
                   Join Program <i class="fas fa-chevron-right"></i>
                </a>
            </div>
        </div>
        <?php endfor; ?>
    </div>
</section>

<div id="programJoinModal" class="prog-modal">
    <div class="prog-modal-content">
        <span class="close-modal" aria-label="Close">&times;</span>
        <div class="modal-inner">
            <div class="modal-header-icon" style="color: <?php echo esc_attr($cal_accent); ?>; background: <?php echo esc_attr($cal_accent); ?>10;">
                <div class="icon-pulse" style="border-color: <?php echo esc_attr($cal_accent); ?>;"></div>
                <i class="fas fa-envelope-open-text"></i>
            </div>
            <h2 style="color: <?php echo esc_attr($cal_navy); ?>;">Register Interest</h2>
            <p class="modal-subtitle">Secure your spot and receive details for:</p>
            <div class="program-highlight" style="color: <?php echo esc_attr($cal_navy); ?>;">
                <i class="fas fa-bookmark" style="color: <?php echo esc_attr($cal_accent); ?>;"></i> <span id="selectedProgramName"></span>
            </div>
            
            <form id="programJoinForm" class="compact-form">
                <div class="compact-input-group">
                    <label style="color: <?php echo esc_attr($cal_navy); ?>;">Email Address</label>
                    <div class="input-container">
                        <span class="input-icon" style="color: <?php echo esc_attr($cal_accent); ?>;"><i class="fas fa-at"></i></span>
                        <input type="email" name="user_email" id="user_email" placeholder="e.g. hello@yourmail.com" required>
                    </div>
                </div>
                <input type="hidden" name="program_name" id="hiddenProgName">
                <button type="submit" id="btnJoinSubmit" style="background: <?php echo esc_attr($cal_navy); ?>;">
                    <span>Send Reminder</span>
                    <i class="fas fa-paper-plane"></i>
                </button>
            </form>
            <div id="formFeedback"></div>
        </div>
    </div>
</div>

<style>
/* --- CALENDAR STYLES --- */
.calendar-section { padding: 60px 0; background: #ffffff; font-family: 'Plus Jakarta Sans', sans-serif; }
.section-header.text-center { text-align: center; margin-bottom: 40px; }
.badge-gold { display: inline-block; font-weight: 800; font-size: 12px; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 10px; }
.section-title { font-size: 2.2rem; font-weight: 800; margin-bottom: 15px; }
.title-underline { width: 60px; height: 4px; border-radius: 10px; margin: 0 auto; }

.calendar-grid { 
    display: grid; 
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); 
    gap: 20px; 
    max-width: 1200px; 
    margin: 0 auto; 
    padding: 0 20px;
}

.calendar-card { 
    background: #fff; border-radius: 20px; padding: 20px; display: flex; align-items: center; gap: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.03); transition: 0.4s ease; border: 1px solid;
}
.calendar-card:hover { transform: translateY(-5px); border-color: <?php echo esc_attr($cal_accent); ?> !important; box-shadow: 0 15px 35px rgba(0,0,0,0.07); }

.cal-date-box { border-radius: 12px; padding: 12px; display: flex; flex-direction: column; align-items: center; min-width: 65px; color: #fff; }
.cal-day { font-size: 22px; font-weight: 800; line-height: 1; }
.cal-month { font-size: 10px; font-weight: 700; margin-top: 4px; text-transform: uppercase; }

.cal-details h3 { font-size: 1rem; margin: 5px 0; font-weight: 800; }
.cal-meta { font-size: 11px; color: #64748b; font-weight: 600; }
.cal-link { font-size: 12px; text-decoration: none; font-weight: 700; cursor: pointer; display: flex; align-items: center; gap: 5px; }

/* --- MODAL POPUP STYLES --- */
.prog-modal { 
    display: none; position: fixed; z-index: 10000; left: 0; top: 0; width: 100%; height: 100%; 
    background: rgba(15, 23, 42, 0.85); backdrop-filter: blur(8px); 
    align-items: center; justify-content: center; padding: 15px;
}

.prog-modal-content { 
    background: #ffffff; padding: 35px 25px; border-radius: 25px; width: 100%; max-width: 380px; 
    position: relative; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
    margin: auto; animation: modalPop 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

@keyframes modalPop { from { opacity: 0; transform: scale(0.9); } to { opacity: 1; transform: scale(1); } }

.close-modal { 
    position: absolute; top: 15px; right: 15px; font-size: 18px; color: #94a3b8; 
    cursor: pointer; background: #f1f5f9; width: 32px; height: 32px;
    display: flex; align-items: center; justify-content: center; border-radius: 50%;
}

.modal-header-icon { 
    width: 55px; height: 55px; border-radius: 14px; display: flex; align-items: center; justify-content: center; 
    font-size: 20px; margin: 0 auto 15px; position: relative;
}

.icon-pulse {
    position: absolute; width: 100%; height: 100%; border: 2px solid;
    border-radius: 14px; animation: pulseRing 2s infinite; opacity: 0;
}

@keyframes pulseRing { 0% { transform: scale(1); opacity: 0.6; } 100% { transform: scale(1.4); opacity: 0; } }

.modal-inner h2 { font-size: 20px; font-weight: 800; margin-bottom: 5px; text-align: center; }
.modal-subtitle { color: #64748b; font-size: 12px; margin-bottom: 12px; text-align: center; }

.program-highlight {
    background: #f8fafc; padding: 10px; border-radius: 12px;
    font-weight: 700; font-size: 12px; display: flex; align-items: center; justify-content: center; gap: 8px;
    margin-bottom: 25px; border: 1px solid #e2e8f0; width: 100%; box-sizing: border-box;
}

.compact-input-group label { display: block; font-size: 11px; font-weight: 800; margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.5px; }
.input-container input { 
    width: 100%; padding: 12px 12px 12px 40px; border: 1.5px solid #f1f5f9; 
    border-radius: 12px; outline: none; font-size: 14px;
    background: #f8fafc; box-sizing: border-box; transition: 0.3s;
}
.input-container input:focus { border-color: <?php echo esc_attr($cal_accent); ?>; background: #fff; }

#btnJoinSubmit { 
    width: 100%; padding: 14px; color: #fff; border: none; border-radius: 12px; font-weight: 700; font-size: 14px;
    cursor: pointer; transition: 0.3s; display: flex; align-items: center; justify-content: center; gap: 10px;
}
#btnJoinSubmit:hover { background: <?php echo esc_attr($cal_accent); ?> !important; transform: translateY(-2px); }

#formFeedback { margin-top: 15px; font-size: 12px; font-weight: 700; text-align: center; }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('programJoinModal');
    const openBtns = document.querySelectorAll('.open-program-modal');
    const closeBtn = document.querySelector('.close-modal');
    const form = document.getElementById('programJoinForm');

    const closeModalFunc = () => {
        modal.style.display = "none";
        document.body.style.overflow = 'auto';
    };

    openBtns.forEach(btn => {
        btn.onclick = function() {
            const program = this.getAttribute('data-program');
            document.getElementById('selectedProgramName').innerText = program;
            document.getElementById('hiddenProgName').value = program;
            modal.style.display = "flex";
            document.body.style.overflow = 'hidden';
        };
    });

    closeBtn.onclick = closeModalFunc;
    window.onclick = (e) => { if (e.target == modal) closeModalFunc(); };

    form.onsubmit = function(e) {
        e.preventDefault();
        const feedback = document.getElementById('formFeedback');
        const btn = document.getElementById('btnJoinSubmit');
        
        btn.disabled = true;
        btn.innerHTML = '<span>Processing...</span><i class="fas fa-circle-notch fa-spin"></i>';

        const formData = new FormData(this);
        formData.append('action', 'save_program_lead');

        fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if(data.success) {
                feedback.style.color = "#10b981";
                feedback.innerHTML = "Success! We'll be in touch.";
                form.reset();
                setTimeout(() => { closeModalFunc(); feedback.innerHTML = ""; }, 2500);
            } else {
                feedback.style.color = "#ef4444";
                feedback.innerHTML = data.data;
            }
            btn.disabled = false;
            btn.innerHTML = '<span>Send Reminder</span><i class="fas fa-paper-plane"></i>';
        })
        .catch(err => {
            feedback.innerHTML = "Error occurred.";
            btn.disabled = false;
        });
    };
});
</script>
<?php endif; ?>