<div class="toast-wrapper fixed transform -translate-x-1/2 -translate-y-[400%] left-1/2 top-1/2 w-96">
    <div
    {{-- Define style based on `toastKey` prop --}}
        @class([
            'toast p-4 flex justify-center bg-opacity-10 border-2 rounded-md',
            'text-green-900 bg-green-300 border-green-200' => $toastKey === 'success',
            'text-red-900 bg-red-300 border-red-200' => $toastKey === 'fail',
            'text-yellow-900 bg-yellow-300 border-yellow-200' => $toastKey === 'warning',
            'text-blue-900 bg-blue-300 border-blue-200' => $toastKey === 'info',
        ])
    >
        <button type="button" class="absolute top-0 appearance-none close-btn right-2">x</button>
        <p>{{ session($toastKey)  }}</p>
    </div>
</div>

<script defer>
    const toast = document.querySelector('.toast');
    const toastWrapper = document.querySelector('.toast-wrapper');
    const closeBtn = document.querySelector('.close-btn');

    // Show toast
    toast.classList.add('animate-fadeIn');

    // Toast gets removed after the exhibition duration - when informed - expires and isn't hovered
    const tryToRemoveToastIntervalId = setInterval(() => {
        if (!toast.classList.contains('is-hovered')) {
            clearInterval(tryToRemoveToastIntervalId);
            toast.classList.add('animate-fadeOut');
            setTimeout(() => {
                toastWrapper.remove();
            }, @json($closeDurationIsInS * 1000));
        }
    }, @json($exhibitionDurationAfterOpenedInS) * 1000);


    // Define customized exhibition/close duration if set in component's props
    if (@json($openDurationInS)) {
        toast.style.setProperty('--fadeIn-duration', `${@json($openDurationInS)}s`);
    }
    if (@json($closeDurationIsInS)) {
        toast.style.setProperty('--fadeOut-duration', `${@json($closeDurationIsInS)}s`);
    }

    // Define "class toggling" to monitor if the tost is hovered or not (crucial for the logic right below)
    toast.addEventListener('mouseenter', () => {
        toast.classList.add('animate-zoomIn');
        toast.classList.add('is-hovered');
    });
    toast.addEventListener('mouseleave', () => {
        toast.classList.remove('animate-zoomIn');
        toast.classList.remove('is-hovered');
    });

    // Close toast on clicking in 'x'
    closeBtn.addEventListener('click', () => {
        clearInterval(tryToRemoveToastIntervalId);
        toast.classList.remove('animate-zoomIn');
        toast.classList.add('animate-fadeOut');
        setTimeout(() => {
            toastWrapper.remove();
        }, @json($closeDurationIsInS * 1000));
    });
</script>
