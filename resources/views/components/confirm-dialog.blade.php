{{--
|--------------------------------------------------------------------------
| Custom confirmation pop-up (replaces the browser's "... says" box)
|--------------------------------------------------------------------------
| Usage: add data-confirm attributes to a submit button or a form.
|
|   data-confirm-title   = big heading text            (optional)
|   data-confirm         = smaller message under it    (optional)
|   data-confirm-button  = label of the OK button      (optional)
|   data-confirm-tone    = "danger" for a red button   (optional)
|
| Put the attributes on a <button type="submit"> inside a form, or on
| the <form> itself.
--}}

<style>
    #bdConfirm { display:none; position:fixed; inset:0; z-index:99999;
        align-items:center; justify-content:center; padding:16px;
        background:rgba(15,23,42,.55); backdrop-filter:blur(2px); }
    #bdConfirm.bd-open { display:flex; }
    #bdConfirm .bd-box { width:100%; max-width:440px; background:#fff;
        border-radius:20px; padding:28px; box-shadow:0 25px 60px rgba(30,58,138,.35);
        font-family:inherit; animation:bdPop .15s ease-out; }
    #bdConfirm .bd-icon { width:48px; height:48px; border-radius:14px;
        background:#dbeafe; color:#1e3a8a; display:flex; align-items:center;
        justify-content:center; font-size:24px; font-weight:800; margin-bottom:16px; }
    #bdConfirm.bd-danger .bd-icon { background:#fee2e2; color:#dc2626; }
    #bdConfirm .bd-title { margin:0; font-size:19px; font-weight:800; color:#1e3a8a; line-height:1.3; }
    #bdConfirm .bd-message { margin:10px 0 0; font-size:14px; color:#475569;
        line-height:1.6; white-space:pre-line; }
    #bdConfirm .bd-actions { margin-top:24px; display:flex; gap:10px; justify-content:flex-end; }
    #bdConfirm button { cursor:pointer; border-radius:12px; padding:11px 22px;
        font-size:14px; font-weight:700; border:1px solid transparent; transition:background .15s; }
    #bdConfirm .bd-cancel { background:#fff; color:#1e3a8a; border-color:#bfdbfe; }
    #bdConfirm .bd-cancel:hover { background:#eff6ff; }
    #bdConfirm .bd-ok { background:#4f74d9; color:#fff; }
    #bdConfirm .bd-ok:hover { background:#3f63c8; }
    #bdConfirm.bd-danger .bd-ok { background:#dc2626; }
    #bdConfirm.bd-danger .bd-ok:hover { background:#b91c1c; }
    @keyframes bdPop { from { transform:scale(.95); opacity:0; } to { transform:scale(1); opacity:1; } }
</style>

<div id="bdConfirm" role="dialog" aria-modal="true" aria-labelledby="bdConfirmTitle">
    <div class="bd-box">
        <div class="bd-icon" id="bdConfirmIcon">?</div>
        <h3 class="bd-title" id="bdConfirmTitle">Please confirm</h3>
        <p class="bd-message" id="bdConfirmMessage"></p>
        <div class="bd-actions">
            <button type="button" class="bd-cancel" id="bdConfirmCancel">Cancel</button>
            <button type="button" class="bd-ok" id="bdConfirmOk">Confirm</button>
        </div>
    </div>
</div>

<script>
(function () {
    var box = document.getElementById('bdConfirm');
    var titleEl = document.getElementById('bdConfirmTitle');
    var msgEl = document.getElementById('bdConfirmMessage');
    var iconEl = document.getElementById('bdConfirmIcon');
    var okBtn = document.getElementById('bdConfirmOk');
    var cancelBtn = document.getElementById('bdConfirmCancel');
    var onConfirm = null;
    var lastFocus = null;

    function openDialog(source, callback) {
        titleEl.textContent = source.getAttribute('data-confirm-title') || 'Please confirm';
        msgEl.textContent = source.getAttribute('data-confirm') || '';
        msgEl.style.display = msgEl.textContent ? '' : 'none';
        okBtn.textContent = source.getAttribute('data-confirm-button') || 'Confirm';
        var danger = source.getAttribute('data-confirm-tone') === 'danger';
        box.classList.toggle('bd-danger', danger);
        iconEl.textContent = danger ? '!' : '?';
        onConfirm = callback;
        lastFocus = document.activeElement;
        box.classList.add('bd-open');
        okBtn.focus();
    }

    function closeDialog() {
        box.classList.remove('bd-open');
        onConfirm = null;
        if (lastFocus && lastFocus.focus) { lastFocus.focus(); }
    }

    okBtn.addEventListener('click', function () {
        var run = onConfirm;
        closeDialog();
        if (run) { run(); }
    });
    cancelBtn.addEventListener('click', closeDialog);
    box.addEventListener('click', function (e) { if (e.target === box) { closeDialog(); } });
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && box.classList.contains('bd-open')) { closeDialog(); }
    });

    function submitForm(form, submitter) {
        form.setAttribute('data-bd-confirmed', '1');
        try {
            if (form.requestSubmit) { form.requestSubmit(submitter || undefined); }
            else { form.submit(); }
        } finally {
            form.removeAttribute('data-bd-confirmed');
        }
    }

    // Buttons that have data-confirm
    document.addEventListener('click', function (e) {
        var btn = e.target.closest ? e.target.closest('button[data-confirm], button[data-confirm-title]') : null;
        if (!btn || !btn.form || btn.disabled) { return; }
        e.preventDefault();
        openDialog(btn, function () { submitForm(btn.form, btn); });
    }, true);

    // Forms that have data-confirm
    document.addEventListener('submit', function (e) {
        var form = e.target;
        if (!form.hasAttribute || form.hasAttribute('data-bd-confirmed')) { return; }
        if (!form.hasAttribute('data-confirm') && !form.hasAttribute('data-confirm-title')) { return; }
        e.preventDefault();
        openDialog(form, function () { submitForm(form, e.submitter); });
    }, true);
})();
</script>
