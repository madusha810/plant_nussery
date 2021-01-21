@if(count($errors) > 0)
    
@endif

@if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
@endif



@if(session('info'))
        <div class="alert alert-info">
            {{session('info')}}
        </div>
@endif

@if(session('success_alert'))
        <div class="alert alert-success">
            
            {!!"<script>alert('Done');</script>"!!}
            {{session('success_alert')}}
        </div>
@endif