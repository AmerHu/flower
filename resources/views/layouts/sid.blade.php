@foreach($categories_name as $category)

    <h5>
        <a href="/flowers/cate/{{ $category->id }}">{{ $category->cate }}</a>
    </h5>



@endforeach


<style type="text/css">

    .followTab {
        list-style: none;
        position: fixed;
        z-index: 5;
        left:600px;
        top: 100px;
        width: 200px;
          }
</style>


<div class="followTab">
    <img src="http://lorempixel.com/400/200" class="img-responsive"/>
</div>
