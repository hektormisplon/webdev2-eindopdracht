@component('mail::message')
# Your new project | {{ $project->title }}

You created a new project.

{{ $project->description }}

@component('mail::button', ['url' => url("/projects/{$project->id}")])
View project
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
