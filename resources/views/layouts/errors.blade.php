
		@if (count($errors) > 0)
		    <div class="notification notice">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		    <br>
		@endif