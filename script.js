const scrollContent = document.querySelector('.scroll-content');

// 滑鼠懸停時動畫減慢
scrollContent.addEventListener('mouseover', () => {
    scrollContent.style.animationPlayState = 'paused'; // 暫停動畫
    scrollContent.style.transition = 'transform 1s ease'; // 慢慢停下來
});

// 滑鼠移開時恢復動畫
scrollContent.addEventListener('mouseout', () => {
    scrollContent.style.animationPlayState = 'running'; // 恢復動畫
});

