<{{ $tag }} type="button" class="btn ladda-button {{ $color }} {{ $size }} progress-button progress-button" data-style="zoom-out">
    <span class="ladda-label">@if($icon)<i class="fa {{ $icon }}"></i> @endif{{ $text }}</span>
    <span class="ladda-spinner"></span><span class="ladda-spinner"></span>
</{{ $tag }}>

@push('scripts')
    <script>
        $(function () {
	        Ladda.bind('.ladda-button', {
		        timeout: 2000
	        });
	
	        Ladda.bind('.progress-button', {
		        callback: function(instance) {
			        var progress = 0;
			        var interval = setInterval(function() {
				        progress = Math.min(progress + Math.random() * 0.1, 1);
				        instance.setProgress(progress);
				
				        if (progress === 1) {
					        instance.stop();
					        clearInterval(interval);
				        }
			        }, 200);
		        }
	        });
        });
    </script>
@endpush
