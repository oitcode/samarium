<div class="bg-white p-3 mb-3 o-border-radius">
  <div class="mb-4">
    <h3 class="h6 o-heading">
      Questions & Answers
    </h3>
  </div>
  @if (count($product->productQuestions) > 0)
    {{-- Show product reviews --}}
    @foreach ($product->productQuestions as $productQuestion)
      <div class="py-2 my-3 mb-4" style="background-color: #fafafa;">
        <div>
          Q:
          {{ $productQuestion->question_text }}
        </div>
        <hr class="m-0 p-0"/>
        <div class="text-secondary">
          <span class="mr-3">
            {{ count($productQuestion->productAnswers) }} answers
          </span>
          <span class="text-primary" wire:click="answerQuestion({{ $productQuestion }})">
            Add answer
          </span>
        </div>

        @if (count($productQuestion->productAnswers) > 0)
          @foreach ($productQuestion->productAnswers as $productAnswer)
            <div class="my-1 border-top">
              A:
              {{ $productAnswer->answer_text }}
            </div>
          @endforeach
        @endif
      </div>

      @if ($modes['createProductAnswerMode'])
        @if ($answeringProductQuestion->product_question_id == $productQuestion->product_question_id )
          <div class="p-3 border">
            @livewire ('product.dashboard.product-answer-create', ['productQuestion' => $productQuestion,])
          </div>
        @endif
      @endif
    @endforeach
  @else
    No questions
  @endif
</div>
