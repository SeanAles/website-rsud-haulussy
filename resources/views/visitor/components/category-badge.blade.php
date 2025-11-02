{{-- 
Universal Category Badge Component with Glass Morphism Effect & Auto Text Truncation
Usage:
@include('visitor.components.category-badge', [
    'article' => $article,
    'size' => 'sm|md|lg',           // Optional, default: 'md'
    'variant' => 'overlay|inline|top', // Optional, default: 'inline'
    'fallbackLabel' => 'Artikel',   // Optional, default: 'Artikel'
    'maxLength' => 10               // Optional, override auto truncation (sm=8, md=12, lg=no limit)
])

Auto Truncation Rules:
- sm size: Max 8 characters with ellipsis and hover tooltip
- md size: Max 12 characters with ellipsis and hover tooltip  
- lg size: No truncation by default
- Sidebar/Related Articles: Special compact styling with 80px max-width
--}}

@php
    // Default values
    $size = $size ?? 'md';
    $variant = $variant ?? 'inline';
    $fallbackLabel = $fallbackLabel ?? 'Artikel';
    $maxLength = $maxLength ?? null; // Optional parameter untuk truncate
    
    // Size classes
    $sizeClasses = [
        'sm' => 'category-badge-sm',
        'md' => 'category-badge-md', 
        'lg' => 'category-badge-lg'
    ];
    
    // Variant classes
    $variantClasses = [
        'overlay' => 'category-badge-overlay',
        'inline' => 'category-badge-inline',
        'top' => 'category-badge-top'
    ];
    
    $badgeClass = 'category-badge ' . ($sizeClasses[$size] ?? $sizeClasses['md']) . ' ' . ($variantClasses[$variant] ?? $variantClasses['inline']);
    
    // Category data
    $hasCategory = isset($article->articleCategory) && $article->articleCategory && is_object($article->articleCategory);
    $categoryName = $hasCategory ? $article->articleCategory->name : $fallbackLabel;
    $categoryIcon = $hasCategory ? $article->articleCategory->icon : 'fas fa-newspaper';
    $categoryColor = $hasCategory ? $article->articleCategory->color : '#dc3545';
    $categoryUrl = $hasCategory ? route('visitor.categories.show', $article->articleCategory->slug) : null;
    
    // Auto truncate untuk size sm jika tidak ada maxLength yang di-set
    if ($size === 'sm' && $maxLength === null) {
        $maxLength = 8; // Default max 8 karakter untuk sm
    } elseif ($size === 'md' && $maxLength === null) {
        $maxLength = 12; // Default max 12 karakter untuk md
    }
    
    // Truncate category name jika perlu
    $displayName = $categoryName;
    $isTruncated = false;
    if ($maxLength && mb_strlen($categoryName) > $maxLength) {
        $displayName = mb_substr($categoryName, 0, $maxLength - 1) . '…';
        $isTruncated = true;
    }
    
    // Convert hex to RGB for CSS variables
    $colorRgb = $hasCategory ? implode(', ', sscanf($article->articleCategory->color, '#%02x%02x%02x')) : '220, 53, 69';
@endphp

@if($categoryUrl)
<a href="{{ $categoryUrl }}" 
   class="{{ $badgeClass }} category-badge-link" 
   style="--category-color: {{ $categoryColor }}; --category-color-rgb: {{ $colorRgb }};"
   @if($isTruncated) title="{{ $categoryName }}" @else title="Lihat semua artikel dalam kategori {{ $categoryName }}" @endif>
    <i class="{{ $categoryIcon }}"></i>
    <span>{{ $displayName }}</span>
</a>
@else
<span class="{{ $badgeClass }}" 
      style="--category-color: {{ $categoryColor }}; --category-color-rgb: {{ $colorRgb }};"
      @if($isTruncated) title="{{ $categoryName }}" @endif>
    <i class="{{ $categoryIcon }}"></i>
    <span>{{ $displayName }}</span>
</span>
@endif