function slider() {
    return {
        currentSlide: 0,
        isMobile: window.innerWidth <= 768,
        cards: [
            {
                title: "Laporan Online Petugas Register 1",
                description:
                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus.",
            },
            {
                title: "Laporan Online Petugas Register 2",
                description:
                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus.",
            },
            {
                title: "Laporan Online Petugas Register 3",
                description:
                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus.",
            },
            {
                title: "Laporan Online Petugas Register 4",
                description:
                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus.",
            },
            {
                title: "Laporan Online Petugas Register 5",
                description:
                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus.",
            },
            {
                title: "Laporan Online Petugas Register 6",
                description:
                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus.",
            },
        ],
        next() {
            if (this.isMobile) {
                // For mobile view, slide one card at a time
                if (this.currentSlide < this.cards.length - 1) {
                    this.currentSlide++;
                }
            } else {
                // For desktop view, slide 4 cards at a time
                if (this.currentSlide < this.cards.length - 4) {
                    this.currentSlide++;
                }
            }
        },
        prev() {
            if (this.currentSlide > 0) {
                this.currentSlide--;
            }
        },
    };
}
