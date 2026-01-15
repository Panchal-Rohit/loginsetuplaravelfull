@php
    $messages = [
        'success' => ['bg-success', 'Success'],
        'error'   => ['bg-danger', 'Error'],
        'warning' => ['bg-warning', 'Warning'],
        'info'    => ['bg-info', 'Info'],
    ];
@endphp

<style>
    /* Slide IN from RIGHT */
    .toast.slide-in {
        animation: slideInRight 0.5s ease-out forwards;
    }

    /* Slide OUT to RIGHT (same direction) */
    .toast.slide-out {
        animation: slideOutRight 0.5s ease-in forwards;
    }

    @keyframes slideInRight {
        from {
            transform: translateX(120%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideOutRight {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(120%);
            opacity: 0;
        }
    }
</style>

<div class="toast-container position-fixed top-0 end-0 p-3" style="z-index:1100">
    @foreach($messages as $key => $data)
        @if(session($key))
            <div class="toast align-items-center text-white {{ $data[0] }} border-0 mb-2 slide-in"
                 role="alert">
                <div class="d-flex">
                    <div class="toast-body">
                        <strong>{{ $data[1] }}:</strong> {{ session($key) }}
                    </div>
                    <button type="button"
                            class="btn-close btn-close-white me-2 m-auto"
                            data-bs-dismiss="toast"></button>
                </div>
            </div>
        @endif
    @endforeach
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toasts = document.querySelectorAll('.toast');

        toasts.forEach(function (toastEl) {

            // Show toast (Bootstrap)
            const toast = new bootstrap.Toast(toastEl, {
                autohide: false
            });
            toast.show();

            // After 4 seconds → slide OUT to RIGHT
            setTimeout(function () {
                toastEl.classList.remove('slide-in');
                toastEl.classList.add('slide-out');

                // Remove toast after animation ends
                setTimeout(function () {
                    toast.hide();
                }, 500); // slide-out animation time
            }, 4000); // visible duration
        });
    });
</script>
