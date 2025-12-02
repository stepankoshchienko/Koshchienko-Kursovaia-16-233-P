export const Cart = {
  get() {
    return JSON.parse(localStorage.getItem("cart") || "[]");
  },

  save(items) {
    localStorage.setItem("cart", JSON.stringify(items));
  },

  add(product) {
    const cart = this.get();
    const existing = cart.find(i => i.title === product.title);

    if (existing) {
      existing.qty++;
    } else {
      cart.push({ ...product, qty: 1 });
    }

    this.save(cart);
  },

  changeQty(title, delta) {
    const cart = this.get();
    const item = cart.find(i => i.title === title);

    if (!item) return;

    item.qty += delta;

    if (item.qty <= 0) {
      const index = cart.indexOf(item);
      cart.splice(index, 1);
    }

    this.save(cart);
  },

  remove(title) {
    const cart = this.get().filter(i => i.title !== title);
    this.save(cart);
  }
};
