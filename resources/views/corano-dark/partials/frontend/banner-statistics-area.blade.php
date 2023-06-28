 <div class="banner-statistics-area">
     <div class="container">
         <div class="row row-20 mtn-20">
             @foreach ($categories as $global_category)
                 <div class="col-sm-6">
                     <figure class="banner-statistics mt-20">
                         <a href="#">
                             <img src="{{ $global_category->image }} "
                                 alt="product banner">
                         </a>
                         <div class="banner-content text-right">
                             <h5 class="banner-text1">{{ $global_category->name }}</h5>

                             <h2 class="banner-text2">
                                 <span class="text-uppercase">
                                     @php
                                        $subcategory = $global_category->children->first();
                                         $names = explode(' ',$subcategory?->name);
                                     @endphp
                                     @foreach ($names as $name)
                                        <span> {{ $name }}</span>
                                     @endforeach
                                 </span>
                             </h2>
                             @if ($subcategory)

                             <a href="{{ route('shop.index', $subcategory->slug) }}" class="btn btn-text">Shop Now</a>
                             @else
                             <a href="{{ route('shop.index', $global_category->slug) }}" class="btn btn-text">Shop Now</a>
                             @endif
                         </div>
                     </figure>
                 </div>
             @endforeach
         </div>
     </div>
 </div>
