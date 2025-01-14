<div class="blog-details content" x-data="{ showForm: @entangle('showForm') }">
    <div class="comments_area pb-5">
        <ul class="comment__list">
            @forelse($product->approvedReviews as $review)
                <li>
                    <div class="wn__comment">
                        <div class="">
                            @if ($review->user && $review->user->user_image)
                                <img class="rounded-circle"
                                    src="{{ asset('storage/images/users/' . $review->user->user_image) }}" alt=""
                                    width="50">
                            @else
                                <img src="{{ get_gravatar($review->email, 50) }}" alt="{{ $review->name }}">
                            @endif
                        </div>
                        <div class="content d-flex">
                            <div class="">
                                <strong>{{ $review->user->full_name }}</strong>
                                <small
                                    class="comnt__author d-block d-sm-flex">{{ $review->created_at ? $review->created_at->format('d M, Y') : '' }}</small>
                                <div class="review-box">
                                    <div class="ratings">
                                        @if ($review->rating)
                                            @for ($i = 0; $i < 5; $i++)
                                                <span {{ round($review->rating) <= $i ? "class='good'" : '' }}><i
                                                        class="fa fa-star"></i></span>
                                            @endfor
                                        @endif
                                    </div>
                                </div>
                                <div>
                                    <p style="width: 100%; font-size: 14px;">{{ $review->content }}</p>
                                </div>
                            </div>
                            <div class="ml-auto">
                                @if ($currentRatingId === $review->id)
                                    @auth
                                        <span x-on:click="showForm = !showForm" class="text-primary"
                                            style="cursor: pointer">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                        <br><br>
                                        <span
                                            x-on:click.prevent="return confirm('Are you sure?') ? @this.delete({{ $currentRatingId }}) : false"
                                            class="text-danger" style="cursor: pointer">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                    @endauth
                                @endif
                            </div>
                        </div>
                    </div>
                </li>
            @empty
                <a class="m-2">Be the first to write your review!</a>
            @endforelse
        </ul>
    </div>
    @auth
        <div class="comment_respond" x-show="showForm">
            @if ($canRate)
                @if ($showForm)
                    <h3 class="reply_title">{{ $currentRatingId ? 'Your Rating' : 'Leave a Reply' }}</h3>
                    <form wire:submit.prevent="rate()" class="review__form score">
                        <div class="score-wrap">
                            <label for="star1">
                                <input hidden wire:model="rating" type="radio" id="star1" name="rating"
                                    value="1" />
                                <span class="stars-active" data-value="1">
                                    <i class=" @if ($rating >= 1) fas fa-star @else far fa-star @endif"
                                        style="cursor: pointer"></i>
                                </span>
                            </label>
                            <label for="star2">
                                <input hidden wire:model="rating" type="radio" id="star2" name="rating"
                                    value="2" />
                                <span class="stars-active" data-value="2">
                                    <i class=" @if ($rating >= 2) fas fa-star @else far fa-star @endif"
                                        style="cursor: pointer"></i>
                                </span>
                            </label>
                            <label for="star3">
                                <input hidden wire:model="rating" type="radio" id="star3" name="rating"
                                    value="3" />
                                <span class="stars-active" data-value="3">
                                    <i class=" @if ($rating >= 3) fas fa-star @else far fa-star @endif"
                                        style="cursor: pointer"></i>
                                </span>
                            </label>
                            <label for="star4">
                                <input hidden wire:model="rating" type="radio" id="star4" name="rating"
                                    value="4" />
                                <span class="stars-active" data-value="4">
                                    <i class=" @if ($rating >= 4) fas fa-star @else far fa-star @endif"
                                        style="cursor: pointer"></i>
                                </span>
                            </label>
                            <label for="star5">
                                <input hidden wire:model="rating" type="radio" id="star5" name="rating"
                                    value="5" />
                                <span class="stars-active" data-value="5">
                                    <i class=" @if ($rating >= 5) fas fa-star @else far fa-star @endif"
                                        style="cursor: pointer"></i>
                                </span>
                            </label>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <label class="col-form-label"><span class="text-danger">*</span>
                                    Your Review</label>
                                <textarea class="form-control" required wire:model.lazy="content">{{ old('review') }}</textarea>
                                @error('content')
                                    <div class="help-block pt-10"><span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="buttons">
                            @if ($currentRatingId)
                                @auth
                                    <button type="submit" class="btn btn-sqr">Update</button>
                                    <button type="button" x-on:click="showForm = false"
                                        class="btn btn-sqr">Close</button>
                                @endauth
                            @else
                                <button type="submit" class="btn btn-sqr">Rate</button>
                            @endif

                        </div>

                    </form>
                @endif
            @else
                <div class="alert alert-danger" role="alert">
                    <small>Must buy this product before write a review.</small>
                </div>
            @endif
        </div>
    @else
        <a href="{{ route('login') }}" class="btn btn-dark">
            Login to write a review!
        </a>
    @endauth
</div>
