document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".translate-button").forEach(button => {
    button.addEventListener("click", async () => {
      const postId = button.dataset.postId;

      // Категории
      const categoryCheckboxes = document.querySelectorAll(
        `.category-checkbox[data-post-id="${postId}"]:checked`
      );
      const selectedCategories = Array.from(categoryCheckboxes).map(cb =>
        parseInt(cb.value)
      );

      // Типы (необязательные)
      const typeCheckboxes = document.querySelectorAll(
        `.type-checkbox[data-post-id="${postId}"]:checked`
      );
      const selectedTypes = Array.from(typeCheckboxes).map(cb => cb.value);

      button.disabled = true;
      const originalText = button.textContent;
      button.textContent = "Обробка...";

      try {
        console.log(`postId`, postId);
        console.log(`selectedCategories`, selectedCategories);
        console.log(`selectedTypes`, selectedTypes);
        if (selectedCategories.length === 0) {
          const wrapper = document.querySelector(
            `.category-wrapper[data-post-id="${postId}"]`
          );
          if (wrapper) {
            wrapper.classList.add("highlight-border");
            setTimeout(() => {
              wrapper.classList.remove("highlight-border");
            }, 5000);
          }
          alert("Оберіть категорі.... ");
          button.disabled = false;
          button.textContent = originalText;
          return;
        }
        const response = await fetch(translationData.apiUrl, {
          method: "POST",
          headers: {
            Authorization: `Bearer ${translationData.apiKey}`,
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            id: postId,
            categories: selectedCategories,
            types: selectedTypes,
          }),
        });

        if (!response.ok) {
          const errorText = await response.text();
          alert("Помилка під час відправлення: " + errorText);
          button.textContent = "Помилка";
        } else {
          const result = await response.json();
          alert(
            "Переклад успішно зроблено за URL-адресою: " +
              JSON.stringify(result?.url)
          );
          button.textContent = "Готово";
        }
      } catch (error) {
        alert("Мережева помилка: " + error.message);
        button.textContent = "Помилка";
      }

      setTimeout(() => {
        button.disabled = false;
        button.textContent = originalText;
      }, 2000);
    });
  });
});
