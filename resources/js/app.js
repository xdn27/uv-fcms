import './bootstrap.js';

Alpine.store('navigate', {
    loading: false,
    to: null
});

document.addEventListener('livewire:navigate', event => {
    Alpine.store('navigate').loading = true;
    Alpine.store('navigate').to = event.detail.url.href;
});

document.addEventListener('livewire:navigated', event => {
    Alpine.store('navigate').loading = false;
    Alpine.store('navigate').to = null;
});
