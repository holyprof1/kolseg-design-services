const body = document.body;
const nav = document.querySelector(".site-nav");
const menuToggle = document.querySelector(".menu-toggle");
const navDropdowns = nav ? [...nav.querySelectorAll(".nav-dropdown")] : [];

const setBodyNavState = (open) => {
  body.classList.toggle("nav-open", open && window.innerWidth <= 980);
};

const setDropdownExpanded = (dropdown, expanded) => {
  const trigger = dropdown.querySelector(".nav-dropdown-link");
  if (trigger) {
    trigger.setAttribute("aria-expanded", String(expanded));
  }
};

const closeDropdowns = () => {
  navDropdowns.forEach((dropdown) => {
    dropdown.classList.remove("is-open");
    setDropdownExpanded(dropdown, false);
  });
};

const closeMenu = () => {
  if (nav) {
    nav.classList.remove("is-open");
  }

  if (menuToggle) {
    menuToggle.setAttribute("aria-expanded", "false");
    menuToggle.setAttribute("aria-label", "Open navigation");
  }

  setBodyNavState(false);
  closeDropdowns();
};

navDropdowns.forEach((dropdown) => {
  setDropdownExpanded(dropdown, dropdown.classList.contains("is-open"));
});

if (menuToggle && nav) {
  menuToggle.addEventListener("click", () => {
    const open = !nav.classList.contains("is-open");
    nav.classList.toggle("is-open", open);
    menuToggle.setAttribute("aria-expanded", String(open));
    menuToggle.setAttribute("aria-label", open ? "Close navigation" : "Open navigation");
    setBodyNavState(open);

    if (!open) {
      closeDropdowns();
    }
  });

  nav.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", () => {
      if (link.classList.contains("nav-dropdown-link") && window.innerWidth <= 980) {
        return;
      }

      closeMenu();
    });
  });
}

navDropdowns.forEach((dropdown) => {
  const trigger = dropdown.querySelector(".nav-dropdown-link");
  if (!trigger) {
    return;
  }

  trigger.addEventListener("click", (event) => {
    if (window.innerWidth > 980) {
      return;
    }

    event.preventDefault();
    const willOpen = !dropdown.classList.contains("is-open");
    closeDropdowns();
    dropdown.classList.toggle("is-open", willOpen);
    setDropdownExpanded(dropdown, willOpen);
  });
});

window.addEventListener("resize", () => {
  if (window.innerWidth > 980) {
    closeMenu();
    setBodyNavState(false);
  }
});

document.addEventListener("click", (event) => {
  if (!nav || !event.target || !(event.target instanceof Element)) {
    return;
  }

  if (!nav.contains(event.target) && (!menuToggle || !menuToggle.contains(event.target))) {
    closeMenu();
  }
});

document.addEventListener("keydown", (event) => {
  if (event.key === "Escape") {
    closeMenu();
  }
});

const page = body.dataset.page;
document.querySelectorAll(".site-nav a").forEach((link) => {
  const href = link.getAttribute("href");
  if (
    (page === "home" && href === "index.html") ||
    (page === "services" && href === "services.html") ||
    (page === "portfolio" && href === "portfolio.html") ||
    (page === "top-projects" && href === "portfolio.html") ||
    (page === "about" && href === "about.html") ||
    (page === "contact" && href === "contact.html")
  ) {
    link.classList.add("is-active");
  }
});

if (nav) {
  nav.querySelectorAll(".nav-dropdown-panel a").forEach((link) => {
    link.addEventListener("click", () => {
      closeMenu();
    });
  });
}

const revealItems = document.querySelectorAll(".reveal");
const revealObserver = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("is-visible");
        revealObserver.unobserve(entry.target);
      }
    });
  },
  {
    threshold: 0.18,
  }
);

revealItems.forEach((item) => revealObserver.observe(item));

const marqueeTracks = document.querySelectorAll(".media-marquee-track");
marqueeTracks.forEach((track) => {
  const marquee = track.closest(".media-marquee");
  if (!marquee || track.dataset.enhanced === "true") {
    return;
  }

  const cards = [...track.children];
  if (!cards.length) {
    return;
  }

  cards.forEach((card) => {
    const clone = card.cloneNode(true);
    clone.setAttribute("aria-hidden", "true");
    clone.querySelectorAll("a, button").forEach((node) => {
      node.setAttribute("tabindex", "-1");
    });
    track.appendChild(clone);
  });

  track.dataset.enhanced = "true";
  marquee.classList.add("is-ready");
});

const filterButtons = document.querySelectorAll("[data-filter]");
const portfolioCards = document.querySelectorAll(".portfolio-card");

if (filterButtons.length && portfolioCards.length) {
  filterButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const filter = button.dataset.filter;

      filterButtons.forEach((chip) => chip.classList.remove("is-active"));
      button.classList.add("is-active");

      portfolioCards.forEach((card) => {
        const match = filter === "all" || card.dataset.category === filter;
        card.classList.toggle("is-hidden", !match);
      });
    });
  });
}

const videoCards = [...document.querySelectorAll(".video-card[data-video-provider][data-video-id]")];

if (videoCards.length) {
  const lightbox = document.createElement("div");
  lightbox.className = "video-lightbox";
  lightbox.setAttribute("aria-hidden", "true");
  lightbox.innerHTML = `
    <div class="video-lightbox-dialog" role="dialog" aria-modal="true" aria-label="Video player">
      <button class="video-lightbox-close" type="button" aria-label="Close video">Close</button>
      <div class="video-lightbox-frame"></div>
    </div>
  `;

  const frame = lightbox.querySelector(".video-lightbox-frame");
  const closeButton = lightbox.querySelector(".video-lightbox-close");
  let lastTrigger = null;

  const getEmbedUrl = (provider, id) => {
    if (provider === "youtube") {
      return `https://www.youtube.com/embed/${id}?autoplay=1&rel=0`;
    }

    if (provider === "vimeo") {
      return `https://player.vimeo.com/video/${id}?autoplay=1`;
    }

    return "";
  };

  const closeLightbox = () => {
    lightbox.classList.remove("is-open");
    lightbox.setAttribute("aria-hidden", "true");
    document.body.style.overflow = "";
    if (frame) {
      frame.innerHTML = "";
    }
    if (lastTrigger instanceof HTMLElement) {
      lastTrigger.focus();
    }
  };

  const openLightbox = (card) => {
    const provider = card.dataset.videoProvider;
    const id = card.dataset.videoId;
    const src = getEmbedUrl(provider, id);
    if (!src || !frame) {
      return;
    }

    lastTrigger = card;
    frame.innerHTML = `<iframe src="${src}" title="KOLSEG video player" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>`;
    lightbox.classList.add("is-open");
    lightbox.setAttribute("aria-hidden", "false");
    document.body.style.overflow = "hidden";
    if (closeButton instanceof HTMLElement) {
      closeButton.focus();
    }
  };

  videoCards.forEach((card) => {
    card.addEventListener("click", (event) => {
      event.preventDefault();
      openLightbox(card);
    });
  });

  if (closeButton) {
    closeButton.addEventListener("click", closeLightbox);
  }

  lightbox.addEventListener("click", (event) => {
    if (event.target === lightbox) {
      closeLightbox();
    }
  });

  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape" && lightbox.classList.contains("is-open")) {
      closeLightbox();
    }
  });

  document.body.appendChild(lightbox);
}

const contactForm = document.querySelector(".contact-form");
if (contactForm) {
  contactForm.addEventListener("submit", (event) => {
    event.preventDefault();
    const button = contactForm.querySelector("button");
    if (button) {
      const original = button.textContent;
      button.textContent = "Inquiry Sent";
      button.disabled = true;
      setTimeout(() => {
        button.textContent = original;
        button.disabled = false;
        contactForm.reset();
      }, 1800);
    }
  });
}
