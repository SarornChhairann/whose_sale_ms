<div id="no-data-{{ $type }}" class="no-data-container" style="display: flex; justify-content: center; align-items: center; text-align: center;">
    <div class="lottie-wrapper">
        <lottie-player
            src="{{ asset('animation/' . $type . '.json') }}"
            background="transparent"
            speed="1"
            style="width: 100px; height: 100px; margin: 0 auto;"
            loop
            autoplay
        ></lottie-player>
        <p>{{ $message }}</p>
    </div>
</div>