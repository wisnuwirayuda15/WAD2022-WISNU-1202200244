<div style="z-index: 9;" class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill {{ session('color') }}" viewBox="0 0 16 16">
                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2z"/>
            </svg>
            <strong class="px-2 me-auto text-dark mt-1" style="font-size: 17px"> Message</strong>
            <small>{{ date("h:i a") }}</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" style="background-color: rgba(230, 230, 230, 1);">
            {{ session('toast') }}
        </div>
    </div>
</div>

