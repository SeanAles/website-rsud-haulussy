{{-- 
Universal Category Badge Component with Glass Morphism Effect
Usage:
@include('visitor.components.category-badge', [
    'article' => $article,
    'size' => 'sm|md|lg',           // Optional, default: 'md'
    'variant' => 'overlay|inline|top', // Optional, default: 'inline'
    'fallbackLabel' => 'Artikel'    // Optional, default: 'Artikel'
])
--}}

@php
    // Default values
    $size = $size ?? 'md';
    $variant = $variant ?? 'inline';
    $fallbackLabel = $fallbackLabel ?? 'Artikel';
    
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
    $categoryColor = $hasCategory ? $article->articleCategory->color : '#1B71A1';
    
    // Convert hex to RGB for CSS variables
    $colorRgb = $hasCategory ? implode(', ', sscanf($article->articleCategory->color, '#%02x%02x%02x')) : '27, 113, 161';
@endphp

<span class="{{ $badgeClass }}" 
      style="--category-color: {{ $categoryColor }}; --category-color-rgb: {{ $colorRgb }};">
    <i class="{{ $categoryIcon }}"></i>
    <span>{{ $categoryName }}</span>
</span>