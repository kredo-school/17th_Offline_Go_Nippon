@extends('layouts.app')

@section('content')

<style>
    /* -------------------------------------- */
    /* ** CUSTOM CSS FOR UNIFIED DESIGN ** */
    /* -------------------------------------- */

    /* Global Fonts and Background */
    body, html {
        font-family: 'Source Serif Pro', serif; 
        background-color: white; 
    }

    /* Page Container for Centering */
    .full-page-container {
        display: flex;
        justify-content: center;
        align-items: flex-start; 
        min-height: 100vh;
        padding-top: 80px;
        position: relative; 
        background-color: white; 
    }

    /* Form Container (Wide Card) */
    .post-container {
        width: 100%;
        max-width: 760px; /* Maintains the double-width requirement */
        padding: 40px 30px;
        background-color: white; 
        border: 1px solid #9F6B46; /* Brown border */
        border-radius: 5px;
        box-sizing: border-box;
    }

    /* Header Styling */
    .post-header {
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem; 
        color: #9F6B46;
        font-weight: 700;
        margin-bottom: 2rem;
        padding-bottom: 15px;
        border-bottom: 1px solid #F8C7B3; 
    }
    .post-header i {
        font-size: 1.5em;
        margin-right: 10px;
    }

    /* Form Labels (Brown) */
    .post-label {
        font-weight: 600; 
        margin-bottom: 0.3rem; 
        display: block;
        text-align: left;
        font-size: 1rem;
        color: #9F6B46; 
    }

    /* Input/Select/Textarea Common Style (100% width, Brown Text) */
    .post-input, .form-select.post-input {
        height: 40px; 
        border-radius: 5px;
        padding: 0.375rem 1rem;
        border: 1px solid #ced4da; 
        font-size: 1rem;
        width: 100%;
        color: #9F6B46; /* Text color is brown */
    }
    
    textarea.post-input {
        height: 120px; 
        resize: vertical;
        padding: 1rem;
    }

    .post-input:focus {
        box-shadow: 0 0 0 0.25rem rgba(159, 107, 70, 0.25);
        border-color: #9F6B46;
    }

    /* Placeholder Text (Brown) */
    .post-input::placeholder {
        color: #9F6B46 !important;
        opacity: 0.8;
    }
    
    /* Select Dropdown Arrow Customization */
    .form-select.post-input {
        appearance: none;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%239F6B46' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 0.75rem center;
        background-size: 16px 12px;
    }


    /* Time Input Specifics */
    .time-input {
        width: 60px !important;
        text-align: center;
        padding: 0.375rem 0.5rem;
    }
    .time-unit {
        margin: 0 5px;
        color: #9F6B46;
    }
    
    /* Cost Display */
    .cost-display {
        color: #9F6B46;
        font-weight: 600;
        margin-left: 10px;
        min-width: 60px;
    }
    
    /* Range Input (Slider) Customization */
    .range-wrap {
        display: flex;
        align-items: center;
        padding: 5px 0;
    }
    .range-input {
        width: 100%;
        height: 5px;
        background: #F8C7B3;
        border-radius: 5px;
        appearance: none;
        cursor: pointer;
    }
    .range-input::-webkit-slider-thumb {
        appearance: none;
        width: 15px;
        height: 15px;
        background: #9F6B46;
        border-radius: 50%;
    }
    
    /* Image Section */
    .image-controls {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }
    .image-btn {
        background-color: #F8F8F8;
        border: 1px solid #9F6B46;
        color: #9F6B46;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
        margin-right: 10px;
        font-weight: 500;
    }
    .image-preview-area {
        display: flex;
        gap: 15px;
        margin-top: 10px;
        overflow-x: auto; 
        padding-bottom: 10px;
    }
    .image-item {
        width: 100px;
        height: 100px;
        border-radius: 5px;
        overflow: hidden;
        position: relative;
        flex-shrink: 0;
        border: 1px solid #ccc;
    }
    .image-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .image-error {
        background-color: #fce8e6;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #db4437;
        font-size: 2rem;
    }
    .image-loading {
        background: linear-gradient(90deg, #eee 25%, #ddd 50%, #eee 75%);
        background-size: 200% 100%;
        animation: loading 1.5s infinite;
    }
    @keyframes loading {
        0% { background-position: 200% 0; }
        100% { background-position: -200% 0; }
    }
    

    /* Footer Buttons (Cancel / Post) */
    .form-footer {
        display: flex;
        justify-content: flex-end; 
        gap: 15px;
        padding-top: 20px;
    }
    .btn-cancel {
        background-color: white;
        color: #F8C7B3;
        border: 1px solid  #F8C7B3;
        padding: 8px 25px;
        font-weight: 600;
        border-radius: 5px;
    }
    .btn-post {
        background-color: #F8C7B3;
        color: #9F6B46;
        border: 1px solid #F8C7B3;
        padding: 8px 25px;
        font-weight: 600;
        border-radius: 5px;
    }

</style>

<div class="full-page-container">
    
    <div class="post-container">
        
        <div class="post-header">
            <i class="fa-solid fa-circle-plus"></i> Create Post
        </div>

        {{-- Set the action to the 'post.store' route defined in your routes/web.php --}}
        <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label post-label">Title</label>
                <input id="title" type="text" class="form-control post-input @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autofocus placeholder="Arakurayamasengen Park">

                @error('title')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label post-label">Description</label>
                <textarea id="description" class="form-control post-input @error('description') is-invalid @enderror" name="description" rows="4" required placeholder="Approximately 650 cherry trees are planted in the park, and in the spring a cherry blossom festival is held, attracting many visitors.">{{ old('description') }}</textarea>

                @error('description')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            
            <div class="row mb-3">
                <div class="col-md-6 mb-3 mb-md-0">
                    <label for="date" class="form-label post-label">Date</label>
                    <input id="date" type="date" class="form-control post-input @error('date') is-invalid @enderror" name="date" value="{{ old('date', date('Y-m-d')) }}">
                    @error('date')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                
                <div class="col-md-6">
                    <label for="time" class="form-label post-label">Time</label>
                    <div class="d-flex align-items-center">
                        <input type="number" class="form-control post-input time-input @error('time_hour') is-invalid @enderror" name="time_hour" value="{{ old('time_hour', '0') }}" min="0" max="23">
                        <span class="time-unit">hour</span>
                        <input type="number" class="form-control post-input time-input @error('time_min') is-invalid @enderror" name="time_min" value="{{ old('time_min', '50') }}" min="0" max="59">
                        <span class="time-unit">min</span>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
               <div class="col-md-7">
    <label for="categories" class="form-label post-label">Categories (up to 3)</label>
    <div class="d-flex gap-2">
        
        {{-- カテゴリ 1 (category[]) --}}
        <select class="form-select post-input @error('category.0') is-invalid @enderror" name="category[]">
            <option value="mountain" {{ old('category.0') == 'mountain' ? 'selected' : '' }}>Mountain</option>
            <option value="cafe" {{ old('category.0') == 'cafe' ? 'selected' : '' }}>Cafe</option>
            <option value="temple" {{ old('category.0') == 'temple' ? 'selected' : '' }}>Temple</option>
            <option value="tour" {{ old('category.0') == 'tour' ? 'selected' : '' }}>Tour</option>
            <option value="sea" {{ old('category.0') == 'sea' ? 'selected' : '' }}>Sea</option>
            <option value="culture" {{ old('category.0') == 'culture' ? 'selected' : '' }}>Culture</option>
            <option value="food" {{ old('category.0') == 'food' ? 'selected' : '' }}>Food</option>
        </select>
        
        {{-- カテゴリ 2 (category[]) --}}
        <select class="form-select post-input @error('category.1') is-invalid @enderror" name="category[]">
            <option value="mountain" {{ old('category.1') == 'mountain' ? 'selected' : '' }}>Mountain</option>
            <option value="cafe" {{ old('category.1') == 'cafe' ? 'selected' : '' }}>Cafe</option>
            <option value="temple" {{ old('category.1') == 'temple' ? 'selected' : '' }}>Temple</option>
            <option value="tour" {{ old('category.1') == 'tour' ? 'selected' : '' }}>Tour</option>
            <option value="sea" {{ old('category.1') == 'sea' ? 'selected' : '' }}>Sea</option>
            <option value="culture" {{ old('category.1') == 'culture' ? 'selected' : '' }}>Culture</option>
            <option value="food" {{ old('category.1') == 'food' ? 'selected' : '' }}>Food</option>
        </select>
        
        {{-- カテゴリ 3 (category[]) --}}
        <select class="form-select post-input @error('category.2') is-invalid @enderror" name="category[]">
            <option value="mountain" {{ old('category.2') == 'mountain' ? 'selected' : '' }}>Mountain</option>
            <option value="cafe" {{ old('category.2') == 'cafe' ? 'selected' : '' }}>Cafe</option>
            <option value="temple" {{ old('category.2') == 'temple' ? 'selected' : '' }}>Temple</option>
            <option value="tour" {{ old('category.2') == 'tour' ? 'selected' : '' }}>Tour</option>
            <option value="sea" {{ old('category.2') == 'sea' ? 'selected' : '' }}>Sea</option>
            <option value="culture" {{ old('category.2') == 'culture' ? 'selected' : '' }}>Culture</option>
            <option value="food" {{ old('category.2') == 'food' ? 'selected' : '' }}>Food</option>
        </select>
    </div>
</div>
                
                {{-- Prefecture Field (47 Prefectures) --}}
                <div class="col-md-5">
                    <label for="prefecture" class="form-label post-label">Prefecture</label>
                    <select class="form-select post-input @error('prefecture') is-invalid @enderror" name="prefecture" id="prefecture" required>

                        
                        <optgroup label="Hokkaido & Tohoku">
                            <option value="Hokkaido" {{ old('prefecture') == 'Hokkaido' ? 'selected' : '' }}>Hokkaido</option>
                            <option value="Aomori" {{ old('prefecture') == 'Aomori' ? 'selected' : '' }}>Aomori</option>
                            <option value="Iwate" {{ old('prefecture') == 'Iwate' ? 'selected' : '' }}>Iwate</option>
                            <option value="Miyagi" {{ old('prefecture') == 'Miyagi' ? 'selected' : '' }}>Miyagi</option>
                            <option value="Akita" {{ old('prefecture') == 'Akita' ? 'selected' : '' }}>Akita</option>
                            <option value="Yamagata" {{ old('prefecture') == 'Yamagata' ? 'selected' : '' }}>Yamagata</option>
                            <option value="Fukushima" {{ old('prefecture') == 'Fukushima' ? 'selected' : '' }}>Fukushima</option>
                        </optgroup>

                        <optgroup label="Kanto">
                            <option value="Ibaraki" {{ old('prefecture') == 'Ibaraki' ? 'selected' : '' }}>Ibaraki</option>
                            <option value="Tochigi" {{ old('prefecture') == 'Tochigi' ? 'selected' : '' }}>Tochigi</option>
                            <option value="Gunma" {{ old('prefecture') == 'Gunma' ? 'selected' : '' }}>Gunma</option>
                            <option value="Saitama" {{ old('prefecture') == 'Saitama' ? 'selected' : '' }}>Saitama</option>
                            <option value="Chiba" {{ old('prefecture') == 'Chiba' ? 'selected' : '' }}>Chiba</option>
                            <option value="Tokyo" {{ old('prefecture') == 'Tokyo' ? 'selected' : '' }}>Tokyo</option>
                            <option value="Kanagawa" {{ old('prefecture') == 'Kanagawa' ? 'selected' : '' }}>Kanagawa</option>
                        </optgroup>

                        <optgroup label="Chubu">
                            <option value="Niigata" {{ old('prefecture') == 'Niigata' ? 'selected' : '' }}>Niigata</option>
                            <option value="Toyama" {{ old('prefecture') == 'Toyama' ? 'selected' : '' }}>Toyama</option>
                            <option value="Ishikawa" {{ old('prefecture') == 'Ishikawa' ? 'selected' : '' }}>Ishikawa</option>
                            <option value="Fukui" {{ old('prefecture') == 'Fukui' ? 'selected' : '' }}>Fukui</option>
                            <option value="Yamanashi" {{ old('prefecture') == 'Yamanashi' ? 'selected' : '' }}>Yamanashi</option>
                            <option value="Nagano" {{ old('prefecture') == 'Nagano' ? 'selected' : '' }}>Nagano</option>
                            <option value="Gifu" {{ old('prefecture') == 'Gifu' ? 'selected' : '' }}>Gifu</option>
                            <option value="Shizuoka" {{ old('prefecture') == 'Shizuoka' ? 'selected' : '' }}>Shizuoka</option>
                            <option value="Aichi" {{ old('prefecture') == 'Aichi' ? 'selected' : '' }}>Aichi</option>
                        </optgroup>

                        <optgroup label="Kinki">
                            <option value="Mie" {{ old('prefecture') == 'Mie' ? 'selected' : '' }}>Mie</option>
                            <option value="Shiga" {{ old('prefecture') == 'Shiga' ? 'selected' : '' }}>Shiga</option>
                            <option value="Kyoto" {{ old('prefecture') == 'Kyoto' ? 'selected' : '' }}>Kyoto</option>
                            <option value="Osaka" {{ old('prefecture') == 'Osaka' ? 'selected' : '' }}>Osaka</option>
                            <option value="Hyogo" {{ old('prefecture') == 'Hyogo' ? 'selected' : '' }}>Hyogo</option>
                            <option value="Nara" {{ old('prefecture') == 'Nara' ? 'selected' : '' }}>Nara</option>
                            <option value="Wakayama" {{ old('prefecture') == 'Wakayama' ? 'selected' : '' }}>Wakayama</option>
                        </optgroup>

                        <optgroup label="Chugoku & Shikoku">
                            <option value="Tottori" {{ old('prefecture') == 'Tottori' ? 'selected' : '' }}>Tottori</option>
                            <option value="Shimane" {{ old('prefecture') == 'Shimane' ? 'selected' : '' }}>Shimane</option>
                            <option value="Okayama" {{ old('prefecture') == 'Okayama' ? 'selected' : '' }}>Okayama</option>
                            <option value="Hiroshima" {{ old('prefecture') == 'Hiroshima' ? 'selected' : '' }}>Hiroshima</option>
                            <option value="Yamaguchi" {{ old('prefecture') == 'Yamaguchi' ? 'selected' : '' }}>Yamaguchi</option>
                            <option value="Tokushima" {{ old('prefecture') == 'Tokushima' ? 'selected' : '' }}>Tokushima</option>
                            <option value="Kagawa" {{ old('prefecture') == 'Kagawa' ? 'selected' : '' }}>Kagawa</option>
                            <option value="Ehime" {{ old('prefecture') == 'Ehime' ? 'selected' : '' }}>Ehime</option>
                            <option value="Kochi" {{ old('prefecture') == 'Kochi' ? 'selected' : '' }}>Kochi</option>
                        </optgroup>

                        <optgroup label="Kyushu & Okinawa">
                            <option value="Fukuoka" {{ old('prefecture') == 'Fukuoka' ? 'selected' : '' }}>Fukuoka</option>
                            <option value="Saga" {{ old('prefecture') == 'Saga' ? 'selected' : '' }}>Saga</option>
                            <option value="Nagasaki" {{ old('prefecture') == 'Nagasaki' ? 'selected' : '' }}>Nagasaki</option>
                            <option value="Kumamoto" {{ old('prefecture') == 'Kumamoto' ? 'selected' : '' }}>Kumamoto</option>
                            <option value="Oita" {{ old('prefecture') == 'Oita' ? 'selected' : '' }}>Oita</option>
                            <option value="Miyazaki" {{ old('prefecture') == 'Miyazaki' ? 'selected' : '' }}>Miyazaki</option>
                            <option value="Kagoshima" {{ old('prefecture') == 'Kagoshima' ? 'selected' : '' }}>Kagoshima</option>
                            <option value="Okinawa" {{ old('prefecture') == 'Okinawa' ? 'selected' : '' }}>Okinawa</option>
                        </optgroup>
                    </select>

                    @error('prefecture')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

           {{-- Cost --}}
            <div class="mb-4" style="width: 60%;">
                <label class="post-label" for="cost-slider">Cost</label>
                <div class="range-wrap">
                    <span class="cost-display" id="cost-current">¥100</span>
                    <input id="cost-slider" name="cost" type="range" min="0" max="10000" step="100" value="100" class="range-input">
                </div>
            </div>

            {{-- Image --}}
            <div class="mb-4">
                <label class="post-label" for="file-upload">Images (up to 3)</label>
                <div class="image-controls">
                    <label for="file-upload" class="image-btn">+ Add</label>
                    <input id="file-upload" name="image[]" type="file" accept="image/*" multiple hidden>
                </div>
                <div id="image-previews" class="image-preview-area"></div>
            </div>

            {{-- Footer --}}
            <div class="form-footer">
                <button type="button" class="btn-cancel" onclick="window.history.back()">Cancel</button>
                <button type="submit" class="btn-post">Post</button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const MAX_IMAGES = 3;
    const input = document.getElementById('file-upload');
    const previewArea = document.getElementById('image-previews');
    const costSlider = document.getElementById('cost-slider');
    const costDisplay = document.getElementById('cost-current');

    // コストスライダー更新
    costSlider.addEventListener('input', () => {
        costDisplay.textContent = '¥' + costSlider.value;
    });

    // 画像プレビュー処理
    input.addEventListener('change', function(e) {
        const files = Array.from(e.target.files);
        const existing = previewArea.querySelectorAll('.image-item').length;
        const addable = Math.min(files.length, MAX_IMAGES - existing);

        files.slice(0, addable).forEach(file => {
            const reader = new FileReader();
            reader.onload = function(ev) {
                const div = document.createElement('div');
                div.classList.add('image-item');

                const img = document.createElement('img');
                img.src = ev.target.result;

                const removeBtn = document.createElement('span');
                removeBtn.classList.add('remove-btn');
                removeBtn.textContent = '×';
                removeBtn.onclick = () => div.remove();

                div.appendChild(img);
                div.appendChild(removeBtn);
                previewArea.appendChild(div);
            };
            reader.readAsDataURL(file);
        });

        // ファイルリセット（再度同じファイル選択可能に）
        input.value = '';
    });
});
</script>

@endsection