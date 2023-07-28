<x-forms::field-wrapper :id="$getId()" :label="$getLabel()" :label-sr-only="$isLabelHidden()" :helper-text="$getHelperText()" :hint="$getHint()"
    :hint-icon="$getHintIcon()" :required="$isRequired()" :state-path="$getStatePath()">
    <div class="w-full" x-on:resize.window="window.elementHeightx = calcHeight()" x-data="{
        state: $wire.entangle('{{ $getStatePath() }}'),
        isJson: {{ json_encode($getJsonFormatted()) }},
        get formattedState() {
            return this.isJson ? this.state : JSON.parse(this.state)
        },
        setHeight() {
            const height = {{ $getHeight() ?? 0 }};
            $refs.editor.style['height'] = (height ? height : this.calcHeight()) + 'px';
        },
        calcHeight() {
            // const max = document.querySelector('.filament-body')?.offsetHeight ?? 0;
            const max = window.innerHeight;
    
            const formElements = [
                document.querySelector('.filament-forms-card-component'),
            ];
            const elements = [
                document.querySelector('.filament-main-topbar')?.offsetHeight,
                document.querySelector('.filament-header')?.offsetHeight,
                document.querySelector('.filament-form-actions')?.offsetHeight,
                document.querySelector('.filament-main-footer')?.offsetHeight,
            ];
    
            const elementsTotalHeight = elements.filter((x) => x).reduce((total, value) => total + value, 0);
            const totalPadding = formElements.filter((x) => x).reduce((total, value) => {
                return parseFloat(window.getComputedStyle(value).getPropertyValue('padding-top')) * 2 + total
            }, 0) + (elements.length * 24);
    
            return max - elementsTotalHeight - totalPadding;
        }
    }"
        x-init="$nextTick(() => {
            setHeight();
            const options = {
                modes: {{ $getModes() }},
                history: true,
                onChange: function() {},
                onChangeJSON: function(json) {
                    state = JSON.stringify(json);
                },
                onChangeText: function(jsonString) {
                    state = jsonString;
                },
                onValidationError: function(errors) {
                    errors.forEach((error) => {
                        switch (error.type) {
                            case 'validation': // schema validation error
                                break;
                            case 'error': // json parse error
                                console.log(error.message);
                                break;
                        }
                    })
                }
            };
            let json_editor = new JSONEditor($refs.editor, options);
            json_editor.set(formattedState);
        })" x-cloak wire:ignore>
        <div x-ref="editor" x-on:resize.window="setHeight()" class="w-full"></div>
    </div>
</x-forms::field-wrapper>
