<div class="sidebar group">
    <x-sidebar title="{{__('pincrio.latest_projects')}}" :collection="$portfoliosSidebar" />
    <x-comment-sidebar title="{{__('pincrio.last_comments')}}"  :collection="$commentsSidebar"/>
</div>
