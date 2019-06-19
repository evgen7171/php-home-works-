'use strict';

const gallery = {
    settings: {
        galleryId: 'gallery',
        openedImageWrapperClass: 'galleryWrapper',
        openedImageCloseBtnSrc: 'public/img/close.png',
        pathForImageMax: 'public/img/galleryWrapper/',
    },
    lastEvent: null,

    init(userSettings = {}) {
        Object.assign(this.settings, userSettings);
        document
            .getElementById('gallery')
            .addEventListener('click', event => {
                event.preventDefault();
                this.containerClickHandler(event);
            });
    },
    containerClickHandler(event) {
        if (event.target.tagName !== 'INPUT') {
            return;
        }
        this.lastEvent = event;
        this.openImage(event.target.id);
    },
    openImage(imageId) {
        this.getScreenContainer().querySelector('.image-max').src = this.settings.pathForImageMax + imageId + '.jpg';

    },
    getScreenContainer() {
        const galleryWrapperElement =
            document.querySelector(`.${this.settings.openedImageWrapperClass}`);
        if (galleryWrapperElement) {
            return galleryWrapperElement;
        }
        return this.createScreenContainer();
    },
    createScreenContainer: function (lastEvent) {
        const htmlText = `<div class="${this.settings.openedImageWrapperClass}">
                                <div class="back"></div>
                                <img src="" class="image-max" alt="">
                                <img src="${this.settings.openedImageCloseBtnSrc}" class="close" alt="">
                              </div>`;
        document.getElementById('gallery').insertAdjacentHTML('beforeend', htmlText);

        const closeImageElement = document.querySelector(`.${this.settings.openedImageWrapperClass} .close`);
        closeImageElement.addEventListener('click', () => {
            this.close();
        });
        return document.querySelector(`.${this.settings.openedImageWrapperClass}`);
    },

    close() {
        document.querySelector(`.${this.settings.openedImageWrapperClass}`).remove();
    }
};

window.onload = () => gallery.init();

const dropZone = $('#upload-container');

dropZone.on('drag dragstart dragend dragover dragenter dragleave drop', function () {
    return false;
});

dropZone.on('dragover dragenter', function () {
    dropZone.addClass('dragover');
});

dropZone.on('dragleave', () => {
    dropZone.removeClass('dragover');
});

dropZone.on('dragleave', function (e) {
    let dx = e.pageX - dropZone.offset().left;
    let dy = e.pageY - dropZone.offset().top;
    if ((dx < 0) || (dx > dropZone.width()) || (dy < 0) || (dy > dropZone.height())) {
        dropZone.removeClass('dragover');
    }
});

dropZone.on('drop', function (e) {
    dropZone.removeClass('dragover');
    let files = e.originalEvent.dataTransfer.files;
    handleUpload();
});

function handleUpload() {
    const el = document.getElementById('upload-container');
    el.submit();
}
