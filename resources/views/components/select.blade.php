<div class="custom-select-container">
    @if($label)
        <label for="{{ $name }}" class="custom-select-label">{{ $label }}</label>
    @endif
    <div class="input-wrapper">
        <input type="text" class="custom-select-main" readonly
            placeholder="Select options...">
        <span class="clear-button" style="display: none;">&times;</span>
    </div>
    <div class="custom-select-search-container" style="display: none;">
        <input type="text" class="custom-select-filter" placeholder="Type to search...">
        <div class="custom-select-dropdown">
            @foreach($options as $option)
                @php
                    $value = $optionValue($option);
                    $label = $optionLabel($option);
                    $isSelected = $isOptionSelected($value);
                @endphp
                <div class="custom-select-option {{ $isSelected ? 'selected' : '' }}"
                     data-value="{{ $value }}"
                     data-label="{{ $label }}">{{ $label }}</div>
            @endforeach
        </div>
    </div>
    <select name="{{ $name }}{{ $multiple ? '[]' : '' }}"
            id="{{ $name }}"
            {{ $multiple ? 'multiple' : '' }}
            class="my-custom-select"
            style="display: none;">
        @if(!$multiple)<option value="" {{ !$selected ? 'selected' : ''  }} disabled hidden>Select option...</option>@endif
        @foreach($options as $option)
            @php
                $value = $optionValue($option);
                $label = $optionLabel($option);
                $isSelected = $isOptionSelected($value);
            @endphp
            <option value="{{ $value }}" {{ $isSelected ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    </select>
</div>

@pushOnce('selectScript')
    <script defer>
    // Obs: Select's `change` event from have to be manually dispatched: when select gets updated via js, the event isn't automatically dispatched.
    document.addEventListener("DOMContentLoaded", function() {
        const containers = document.querySelectorAll(".custom-select-container");

        containers.forEach(container => {
            const mainInput = container.querySelector(".custom-select-main");
            const searchContainer = container.querySelector(".custom-select-search-container");
            const filterInput = container.querySelector(".custom-select-filter");
            const dropdown = container.querySelector(".custom-select-dropdown");
            const select = container.querySelector(".my-custom-select");
            const clearButton = container.querySelector(".clear-button");

            function updateMainInput() {
                const selectedOptions = Array.from(select.selectedOptions);
                if (selectedOptions.length && selectedOptions[0].value !== '') {
                    mainInput.value = selectedOptions.map(opt => opt.text).join(', ');
                    mainInput.classList.remove('placeholder');
                } else {
                    mainInput.value = '';
                    mainInput.classList.add('placeholder');
                    mainInput.placeholder = select.multiple ? 'Select options...' : 'Select option...';
                }
            }

            filterInput.addEventListener("input", function() {
                const keyword = this.value.toLowerCase();
                Array.from(dropdown.children).forEach(option => {
                    option.style.display = option.textContent.toLowerCase().includes(keyword)
                        ? "block"
                        : "none";
                });
            });

            dropdown.addEventListener("click", function(event) {
                if (event.target.classList.contains("custom-select-option")) {
                    const value = event.target.getAttribute("data-value");

                    if (select.multiple) {
                        const option = Array.from(select.options).find(opt => opt.value === value);
                        option.selected = !option.selected;
                        event.target.classList.toggle("selected");
                        filterInput.value = '';
                        updateMainInput();
                    } else {
                        // Change "selection style" on dropdown options
                        // (Remove it from a selected "custom-select-option" when present; add it to the clicked one)
                        dropdown.querySelector('.selected')?.classList.remove('selected');
                        event.target.classList.add("selected");

                        select.value = value;
                        mainInput.value = event.target.getAttribute("data-label");
                        searchContainer.style.display = "none";
                    }

                    select.dispatchEvent(new Event('change'));
                }
            });

            // Clear select
            clearButton.addEventListener("click", function(e) {
                e.stopPropagation();

                Array.from(select.options).forEach(option => option.selected = false);
                if (!select.multiple) {
                    // Select the default option for single select
                    select.options[0].selected = true;
                }
                dropdown.querySelectorAll('.custom-select-option').forEach(opt => {
                    opt.classList.remove('selected');
                });
                updateMainInput();

                select.dispatchEvent(new Event('change'));
            });

            // Toggle searchContainer (select + filtering)
            document.addEventListener("click", function(event) {
                if (!container.contains(event.target)) {
                    searchContainer.style.display = "none";
                } else {
                    searchContainer.style.display = "block";
                    filterInput.focus();
                }
            });

            updateMainInput();

            // Toggle closeButton based on fallback option presence ("Select option(s)...")
            select.addEventListener('change', () => {
                const selectedOptions = Array.from(select.selectedOptions);

                // Obs: A multiple select doesn't have a fallback option such as the single one ("Select options..." comes from a placeholder)
                if (!selectedOptions.length || selectedOptions[0].value === '') {
                    clearButton.style.display = "none";
                } else {
                    clearButton.style.display = "block";
                }
            });
        });
    });
    </script>
@endPushOnce

@pushOnce('selectStyle')
    <style>
    .custom-select-container {
        position: relative;
        width: 100%;
    }
    .custom-select-label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }
    .input-wrapper {
        position: relative;
        width: 100%;
    }
    .custom-select-main {
        width: 100%;
        padding: 8px;
        cursor: pointer;
        box-sizing: border-box;
        color: #333;
    }
    .clear-button {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #999;
        font-size: 18px;
        padding: 0 5px;
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .clear-button:hover {
        color: #666;
    }
    .custom-select-search-container {
        position: absolute;
        width: 100%;
        background: white;
        border: 1px solid #ccc;
        border-top: none;
        z-index: 1000;
    }
    .custom-select-filter {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
        border: none;
        border-bottom: 1px solid #eee;
    }
    .custom-select-dropdown {
        max-height: 200px;
        overflow-y: auto;
    }
    .custom-select-option {
        padding: 8px;
        cursor: pointer;
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .custom-select-option[hidden] {
        color: gray;
    }
    .custom-select-option:hover {
        background-color: #f1f1f1;
    }
    .custom-select-option.selected {
        background-color: #e3f2fd;
    }
    </style>
@endPushOnce
