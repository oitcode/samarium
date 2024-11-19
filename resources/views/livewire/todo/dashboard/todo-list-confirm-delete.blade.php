<div>


  @include ('partials.confirm-delete-modal', [
      'modelName' => 'Todo',
      'modelId' => $todo->todo_id,
      'mainText' => $todo->title,
      'modalId' => 'todoConfirmDeleteModal',
  ])


</div>
