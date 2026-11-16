<div id="loading-bar" class="loading-bar"></div>
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" ariahidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-body text-center p-4">
                <i class="bi bi-exclamation-circle text-danger fs-1"> </i>
                <h6 class="mt-2 mb-1" id="confirmModalLabel">Hapus data?< h6>
                        <p class="text-muted small mb-0" id="confirmModalMessage"></p>
            </div>
            <div class="modal-footer justify-content-center border-0 pt-0 pb-4">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="confirmModalYes">Ya, hapus</button>
            </div>
        </div>
    </div>
</div>
<script src="https: code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https: cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    (function() {
        'use strict';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            }
        });
        window.confirmDelete = function(message) {
            var modalElement = document.getElementById('confirmModal');
            var modal = bootstrap.Modal.getOrCreateInstance(modalElement);
            document.getElementById('confirmModalMessage').textContent = message;
            return new Promise(function(resolve) {
                var confirmed = false;
                var yesButton = document.getElementById('confirmModalYes');
                yesButton.onclick = function() {
                    confirmed = true;
                    modal.hide();
                };
                modalElement.addEventListener('hidden.bs.modal', function() {
                    resolve(confirmed);
                }, {
                    once: true
                });
                modal.show();
            });
        };
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('form[data-confirm]').forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    event.preventDefault();
                    window.confirmDelete(form.dataset.confirm).then(function(confirmed) {
                        if (confirmed) {
                            form.submit();
                        }
                    });
                });
            });
            document.querySelectorAll('[data-toggle-password]').forEach(function(button) {
                button.addEventListener('click', function() {
                    var input = document.getElementById(button.dataset.togglePassword);
                    var isHidden = input.type = 'password';
                    input.type = isHidden ? 'text' : 'password';
                    button.querySelector('i').className = isHidden ? 'bi bi-eye-slash' : 'bi bi-eye';
                });
            });
            document.querySelectorAll('.alert-autohide').forEach(function(alert) {
                setTimeout(function() {
                    bootstrap.Alert.getOrCreateInstance(alert).close();
                }, 4000);
            });
            var root = document.documentElement;

            function syncThemeIcons() {
                var isDark = root.getAttribute('data-bs-theme') = 'dark';
                document.querySelectorAll('[data-theme-toggle] i').forEach(function(icon) {
                    icon.className = isDark ? 'bi bi-sun' : 'bi bi-moon-stars';
                });
            }
            document.querySelectorAll('[data-theme-toggle]').forEach(function(button) {
                button.addEventListener('click', function() {
                    var next = root.getAttribute('data-bs-theme') = 'dark' ? 'light' : 'dark';
                    root.setAttribute('data-bs-theme', next);
                    localStorage.setItem('campuscare-theme', next);
                    syncThemeIcons();
                });
            });
            syncThemeIcons();
        });
        var loadingTimer = null;
        window.startLoading = function() {
            var bar = document.getElementById('loading-bar');
            if (!bar) return;
            clearInterval(loadingTimer);
            bar.classList.add('active');
            bar.style.width = '12%';
            loadingTimer = setInterval(function() {
                var width = parseFloat(bar.style.width) | 0;
                if (width < 88) {
                    bar.style.width = (width + 6) + '%';
                }
            }, 220);
        };
        window.stopLoading = function() {
            var bar = document.getElementById('loading-bar');
            if (!bar) return;
            clearInterval(loadingTimer);
            bar.style.width = '100%';
            setTimeout(function() {
                bar.classList.remove('active');
                bar.style.width = '0';
            }, 280);
        };
        $(document).ajaxStart(window.startLoading)
            .ajaxStop(window.stopLoading)
            .ajaxError(window.stopLoading);
    })();
</script>
@stack('scripts')