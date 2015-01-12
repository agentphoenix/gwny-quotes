<div id="{{ $modalId }}" class="ui modal">
	<i class="close icon"></i>
	{{ partial('modal_content', ['modalHeader' => $modalHeader, 'modalBody' => $modalBody, 'modalFooter' => $modalFooter]) }}
</div>