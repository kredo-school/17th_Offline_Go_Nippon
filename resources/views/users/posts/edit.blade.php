@extends('layouts.app')

@section('content')

<style>
    /* -------------------------------------- */
    /* ** CUSTOM CSS (Create Postから流用) ** */
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
        max-width: 760px;
        padding: 40px 30px;
        background-color: white; 
        border: 1px solid #9F6B46;
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
        color: #9F6B46;
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
        color:  #F8C7B3;
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
    
    .selected-image-preview {
        /* 既存の画像を表示するためのスタイル */
        width: 100px;
        height: 100px;
        border-radius: 5px;
        overflow: hidden;
        margin-right: 15px;
        position: relative;
    }
    .selected-image-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

</style>

<div class="full-page-container">
    
    <div class="post-container">
        
        <div class="post-header">
            <i class="fa-solid fa-pen-to-square"></i> Edit Post
        </div>

        {{-- フォームアクションを 'post.update' ルートに設定し、投稿IDを渡す --}}
        <form method="POST" action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data">
            @csrf
            {{-- PATCHメソッドを指定 --}}
            @method('PATCH')

            <div class="mb-3">
                <label for="title" class="form-label post-label">Title</label>
                {{-- 既存データまたはold()の値を表示 --}}
                <input id="title" type="text" class="form-control post-input @error('title') is-invalid @enderror" name="title" value="{{ old('title', $post->title) }}" required autofocus placeholder="Arakurayamasengen Park">

                @error('title')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label post-label">Description</label>
                {{-- 既存データまたはold()の値を表示 --}}
                <textarea id="description" class="form-control post-input @error('description') is-invalid @enderror" name="description" rows="4" required placeholder="Describe your experience or place details">{{ old('description', $post->description) }}</textarea>

                @error('description')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            
            <div class="row mb-3">
                <div class="col-md-6 mb-3 mb-md-0">
                    <label for="date" class="form-label post-label">Date</label>
                    {{-- 既存データまたはold()の値を表示 --}}
                    <input id="date" type="date" class="form-control post-input @error('date') is-invalid @enderror" name="date" value="{{ old('date', $post->date) }}">
                    @error('date')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                
                <div class="col-md-6">
                    <label for="time" class="form-label post-label">Time</label>
                    <div class="d-flex align-items-center">
                        {{-- 既存データまたはold()の値を表示 --}}
                        <input type="number" class="form-control post-input time-input @error('time_hour') is-invalid @enderror" name="time_hour" value="{{ old('time_hour', $post->time_hour) }}" min="0" max="23">
                        <span class="time-unit">hour</span>
                        {{-- 既存データまたはold()の値を表示 --}}
                        <input type="number" class="form-control post-input time-input @error('time_min') is-invalid @enderror" name="time_min" value="{{ old('time_min', $post->time_min) }}" min="0" max="59">
                        <span class="time-unit">min</span>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                {{-- Categories Field --}}
                <div class="col-md-6">
                    <label for="categories" class="form-label post-label">Categories (up to 3)</label>
                    <div class="d-flex gap-2">
                        
                        @php
                            // old()データが存在しない場合は既存の選択済みカテゴリを使用
                            $old_categories = old('category') ?? $selected_categories; 
                            $categories = ['mountain', 'cafe', 'temple', 'tour', 'sea', 'culture', 'food'];
                        @endphp

                        @for ($i = 0; $i < 3; $i++)
                            <select class="form-select post-input @error('category.' . $i) is-invalid @enderror" name="category[]">
                                <option value="" disabled {{ !isset($old_categories[$i]) ? 'selected' : '' }}>Select Category {{ $i + 1 }}</option>
                                @foreach ($categories as $category_value)
                                    <option value="{{ $category_value }}" 
                                        {{ (isset($old_categories[$i]) && $old_categories[$i] == $category_value) ? 'selected' : '' }}>
                                        {{ ucfirst($category_value) }}
                                    </option>
                                @endforeach
                            </select>
                        @endfor
                        
                    </div>
                </div>
                
                {{-- Prefecture Field (47 Prefectures) --}}
                <div class="col-md-6">
                    <label for="prefecture" class="form-label post-label">Prefecture</label>
                    <select class="form-select post-input @error('prefecture') is-invalid @enderror" name="prefecture" id="prefecture" required>
                        <option value="" disabled {{ !old('prefecture') && !$post->prefecture ? 'selected' : '' }}>Select Prefecture</option>
                        
                        {{-- 47都道府県のリストをここに展開（create_post.blade.phpから流用） --}}
                        <optgroup label="Hokkaido & Tohoku">
                            <option value="Hokkaido" {{ old('prefecture', $post->prefecture) == 'Hokkaido' ? 'selected' : '' }}>Hokkaido</option>
                            <option value="Aomori" {{ old('prefecture', $post->prefecture) == 'Aomori' ? 'selected' : '' }}>Aomori</option>
                            <option value="Iwate" {{ old('prefecture', $post->prefecture) == 'Iwate' ? 'selected' : '' }}>Iwate</option>
                            <option value="Miyagi" {{ old('prefecture', $post->prefecture) == 'Miyagi' ? 'selected' : '' }}>Miyagi</option>
                            <option value="Akita" {{ old('prefecture', $post->prefecture) == 'Akita' ? 'selected' : '' }}>Akita</option>
                            <option value="Yamagata" {{ old('prefecture', $post->prefecture) == 'Yamagata' ? 'selected' : '' }}>Yamagata</option>
                            <option value="Fukushima" {{ old('prefecture', $post->prefecture) == 'Fukushima' ? 'selected' : '' }}>Fukushima</option>
                        </optgroup>
                        <optgroup label="Kanto">
                            <option value="Ibaraki" {{ old('prefecture', $post->prefecture) == 'Ibaraki' ? 'selected' : '' }}>Ibaraki</option>
                            <option value="Tochigi" {{ old('prefecture', $post->prefecture) == 'Tochigi' ? 'selected' : '' }}>Tochigi</option>
                            <option value="Gunma" {{ old('prefecture', $post->prefecture) == 'Gunma' ? 'selected' : '' }}>Gunma</option>
                            <option value="Saitama" {{ old('prefecture', $post->prefecture) == 'Saitama' ? 'selected' : '' }}>Saitama</option>
                            <option value="Chiba" {{ old('prefecture', $post->prefecture) == 'Chiba' ? 'selected' : '' }}>Chiba</option>
                            <option value="Tokyo" {{ old('prefecture', $post->prefecture) == 'Tokyo' ? 'selected' : '' }}>Tokyo</option>
                            <option value="Kanagawa" {{ old('prefecture', $post->prefecture) == 'Kanagawa' ? 'selected' : '' }}>Kanagawa</option>
                        </optgroup>
                        <optgroup label="Chubu">
                            <option value="Niigata" {{ old('prefecture', $post->prefecture) == 'Niigata' ? 'selected' : '' }}>Niigata</option>
                            <option value="Toyama" {{ old('prefecture', $post->prefecture) == 'Toyama' ? 'selected' : '' }}>Toyama</option>
                            <option value="Ishikawa" {{ old('prefecture', $post->prefecture) == 'Ishikawa' ? 'selected' : '' }}>Ishikawa</option>
                            <option value="Fukui" {{ old('prefecture', $post->prefecture) == 'Fukui' ? 'selected' : '' }}>Fukui</option>
                            <option value="Yamanashi" {{ old('prefecture', $post->prefecture) == 'Yamanashi' ? 'selected' : '' }}>Yamanashi</option>
                            <option value="Nagano" {{ old('prefecture', $post->prefecture) == 'Nagano' ? 'selected' : '' }}>Nagano</option>
                            <option value="Gifu" {{ old('prefecture', $post->prefecture) == 'Gifu' ? 'selected' : '' }}>Gifu</option>
                            <option value="Shizuoka" {{ old('prefecture', $post->prefecture) == 'Shizuoka' ? 'selected' : '' }}>Shizuoka</option>
                            <option value="Aichi" {{ old('prefecture', $post->prefecture) == 'Aichi' ? 'selected' : '' }}>Aichi</option>
                        </optgroup>
                        <optgroup label="Kinki">
                            <option value="Mie" {{ old('prefecture', $post->prefecture) == 'Mie' ? 'selected' : '' }}>Mie</option>
                            <option value="Shiga" {{ old('prefecture', $post->prefecture) == 'Shiga' ? 'selected' : '' }}>Shiga</option>
                            <option value="Kyoto" {{ old('prefecture', $post->prefecture) == 'Kyoto' ? 'selected' : '' }}>Kyoto</option>
                            <option value="Osaka" {{ old('prefecture', $post->prefecture) == 'Osaka' ? 'selected' : '' }}>Osaka</option>
                            <option value="Hyogo" {{ old('prefecture', $post->prefecture) == 'Hyogo' ? 'selected' : '' }}>Hyogo</option>
                            <option value="Nara" {{ old('prefecture', $post->prefecture) == 'Nara' ? 'selected' : '' }}>Nara</option>
                            <option value="Wakayama" {{ old('prefecture', $post->prefecture) == 'Wakayama' ? 'selected' : '' }}>Wakayama</option>
                        </optgroup>
                        <optgroup label="Chugoku & Shikoku">
                            <option value="Tottori" {{ old('prefecture', $post->prefecture) == 'Tottori' ? 'selected' : '' }}>Tottori</option>
                            <option value="Shimane" {{ old('prefecture', $post->prefecture) == 'Shimane' ? 'selected' : '' }}>Shimane</option>
                            <option value="Okayama" {{ old('prefecture', $post->prefecture) == 'Okayama' ? 'selected' : '' }}>Okayama</option>
                            <option value="Hiroshima" {{ old('prefecture', $post->prefecture) == 'Hiroshima' ? 'selected' : '' }}>Hiroshima</option>
                            <option value="Yamaguchi" {{ old('prefecture', $post->prefecture) == 'Yamaguchi' ? 'selected' : '' }}>Yamaguchi</option>
                            <option value="Tokushima" {{ old('prefecture', $post->prefecture) == 'Tokushima' ? 'selected' : '' }}>Tokushima</option>
                            <option value="Kagawa" {{ old('prefecture', $post->prefecture) == 'Kagawa' ? 'selected' : '' }}>Kagawa</option>
                            <option value="Ehime" {{ old('prefecture', $post->prefecture) == 'Ehime' ? 'selected' : '' }}>Ehime</option>
                            <option value="Kochi" {{ old('prefecture', $post->prefecture) == 'Kochi' ? 'selected' : '' }}>Kochi</option>
                        </optgroup>
                        <optgroup label="Kyushu & Okinawa">
                            <option value="Fukuoka" {{ old('prefecture', $post->prefecture) == 'Fukuoka' ? 'selected' : '' }}>Fukuoka</option>
                            <option value="Saga" {{ old('prefecture', $post->prefecture) == 'Saga' ? 'selected' : '' }}>Saga</option>
                            <option value="Nagasaki" {{ old('prefecture', $post->prefecture) == 'Nagasaki' ? 'selected' : '' }}>Nagasaki</option>
                            <option value="Kumamoto" {{ old('prefecture', $post->prefecture) == 'Kumamoto' ? 'selected' : '' }}>Kumamoto</option>
                            <option value="Oita" {{ old('prefecture', $post->prefecture) == 'Oita' ? 'selected' : '' }}>Oita</option>
                            <option value="Miyazaki" {{ old('prefecture', $post->prefecture) == 'Miyazaki' ? 'selected' : '' }}>Miyazaki</option>
                            <option value="Kagoshima" {{ old('prefecture', $post->prefecture) == 'Kagoshima' ? 'selected' : '' }}>Kagoshima</option>
                            <option value="Okinawa" {{ old('prefecture', $post->prefecture) == 'Okinawa' ? 'selected' : '' }}>Okinawa</option>
                        </optgroup>
                    </select>

                    @error('prefecture')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-4" style="width: 50%;">
                <label for="cost" class="form-label post-label">Cost</label>
                <div class="range-wrap">
                    <span class="cost-display">¥0</span>
                    {{-- 既存データまたはold()の値を表示 --}}
                    <input type="range" class="range-input" id="cost-slider" name="cost" min="0" max="30000" step="100" value="{{ old('cost', $post->cost) }}" oninput="document.getElementById('cost-current').textContent = '¥' + this.value">
                    <span class="cost-display" id="cost-current">¥{{ old('cost', $post->cost) }}</span>
                </div>
            </div>

            <div class="mb-4">
                <label for="file-upload" class="form-label post-label">Image</label>
                
                <div class="image-controls">
                    <label for="file-upload" class="image-btn">+Add</label>
                    <input type="file" id="file-upload" name="image[]" multiple accept="image/*" style="display: none;" onchange="previewImages(event)">
                    <span class="text-muted small">Choose the file</span>
                    <span class="text-muted small image-name-display" style="margin-left: 5px;">image</span>
                </div>

                @error('image')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
                
                <div id="image-info" class="form-text small" style="color: #9F6B46; margin-top: 5px;">
                    The acceptable formats are jpeg, jpg, png, gif only. <br>
                    Max file size is 1024kb.
                </div>

                <div class="image-preview-area" id="image-previews">
                    {{-- ★既存の画像をここに表示するロジック★ --}}
                    @if ($post->images)
                        @foreach ($post->images as $index => $image)
                            <div class="image-item selected-image-preview" data-index="{{ $index }}" data-path="{{ $image->path }}">
                                <img src="{{ $image->path }}" alt="Current Image {{ $index + 1 }}">
                                <span class="remove-btn" onclick="removeExistingImage(this, '{{ $image->path }}')">×</span>
                            </div>
                        @endforeach
                    @endif
                    
                    </div>
            </div>
            
            <div class="form-footer">
                <button type="button" class="btn btn-cancel" onclick="window.history.back()">Cancel</button>
                <button type="submit" class="btn btn-post text-white">Save</button>
            </div>
        </form>
    </div>
</div>

<script>
    const MAX_IMAGES = 3;
    let existingImagePaths = []; // 既存の画像パスを格納するための配列 (JS削除処理用)

    document.addEventListener('DOMContentLoaded', function() {
        // Costスライダーの初期値を設定
        const slider = document.getElementById('cost-slider');
        const output = document.getElementById('cost-current');
        if (slider && output) {
             // DOMContentLoadedでスライダーの値を表示に反映
             output.textContent = '¥' + slider.value;
        }
        
        // 既存の画像パスを収集（削除ロジックがPostControllerに必要）
        document.querySelectorAll('.selected-image-preview').forEach(item => {
            existingImagePaths.push(item.getAttribute('data-path'));
        });
        
        // 初期画像カウントをUIに反映
        const nameDisplay = document.querySelector('.image-name-display');
        const initialCount = existingImagePaths.length;
        if (nameDisplay && initialCount > 0) {
             nameDisplay.textContent = `${initialCount} images selected (Max ${MAX_IMAGES})`;
        }
    });

    /**
     * 既存の画像を削除する処理（フロントエンドのみ）
     * 実際の削除ロジックはコントローラー側で hidden input などを使って実装が必要です。
     */
    function removeExistingImage(element, path) {
        if (confirm('Are you sure you want to remove this image?')) {
            // 1. DOMから要素を削除
            element.closest('.image-item').remove();
            
            // 2. 既存画像パス配列から削除
            const index = existingImagePaths.indexOf(path);
            if (index > -1) {
                existingImagePaths.splice(index, 1);
            }

            // 3. UIとカウントを更新
            const remainingImages = document.getElementById('image-previews').querySelectorAll('.image-item').length;
            const nameDisplay = document.querySelector('.image-name-display');
            if (nameDisplay) {
                nameDisplay.textContent = remainingImages > 0 ? `${remainingImages} images selected (Max ${MAX_IMAGES})` : 'image';
            }

            // ★重要★ ここでhidden inputを使って、サーバーに「どの既存画像を削除したか」を伝えるロジックが必要です。
            // 例: document.getElementById('deleted_images').value += path + ',';
        }
    }


    /**
     * 選択されたファイルを読み込み、プレビューエリアに表示する関数
     */
    function previewImages(event) {
        const fileInput = event.target;
        let newFiles = Array.from(fileInput.files);
        
        const currentTotal = document.getElementById('image-previews').querySelectorAll('.image-item').length;
        
        // 既存画像と新規アップロードの合計が制限を超えていないかチェック
        if (currentTotal + newFiles.length > MAX_IMAGES) {
            const allowed = MAX_IMAGES - currentTotal;
            if (allowed <= 0) {
                 alert(`Cannot add more images. Maximum of ${MAX_IMAGES} images reached.`);
                 fileInput.value = ''; // ファイル入力をクリア
                 return;
            }
            alert(`You can only add ${allowed} more image(s). Only the first ${allowed} selected will be used.`);
            newFiles = newFiles.slice(0, allowed);
        }

        const previewArea = document.getElementById('image-previews');
        const nameDisplay = document.querySelector('.image-name-display');
        
        // ファイル入力の値をそのまま維持し、新しいファイルのみをDOMに追加
        
        // 選択された各ファイルを処理
        newFiles.forEach((file, i) => {
            const reader = new FileReader();

            reader.onload = function(e) {
                const itemDiv = document.createElement('div');
                itemDiv.className = 'image-item';
                itemDiv.setAttribute('data-new-file', 'true'); // 新規アップロードの目印

                const img = document.createElement('img');
                img.src = e.target.result;
                img.alt = 'New Image Preview ' + (i + 1);

                const removeBtn = document.createElement('span');
                removeBtn.className = 'remove-btn';
                removeBtn.innerHTML = '×';
                
                removeBtn.onclick = function() { 
                    itemDiv.remove();
                    
                    // UI上のカウントを更新
                    const remainingImages = previewArea.querySelectorAll('.image-item').length;
                    if (nameDisplay) {
                        nameDisplay.textContent = remainingImages > 0 ? `${remainingImages} images selected (Max ${MAX_IMAGES})` : 'image';
                    }
                    
                    // NOTE: 新規ファイルの削除はfile inputのFilesリストから削除する必要があるため、
                    // 現状はDOM削除のみとし、ユーザーにはフォームを再選択してもらうか、
                    // FileListを操作する複雑なJSロジックが必要です。
                };
                
                itemDiv.appendChild(img);
                itemDiv.appendChild(removeBtn);
                previewArea.appendChild(itemDiv);
            };

            reader.readAsDataURL(file);
        });
        
        // UI上のカウントを更新
        const finalCount = previewArea.querySelectorAll('.image-item').length;
        if (nameDisplay) {
            nameDisplay.textContent = `${finalCount} images selected (Max ${MAX_IMAGES})`;
        }
    }
</script>
@endsection