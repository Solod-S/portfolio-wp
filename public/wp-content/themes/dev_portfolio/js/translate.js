document.addEventListener("DOMContentLoaded", function () {
  const buttons = document.querySelectorAll(".translate-button");

  buttons.forEach(btn => {
    btn.addEventListener("click", async () => {
      const postId = btn.getAttribute("data-post-id");
      console.log(`Переклад поста з ID: ${postId}`);

      btn.disabled = true;
      btn.textContent = "Перекласти...";

      const container = btn.parentElement;
      const oldMsg = container.querySelector(".translation-message");
      if (oldMsg) oldMsg.remove();

      try {
        const response = await fetch(translateData.apiUrl, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "x-api-key": translateData.apiKey,
          },
          body: JSON.stringify({ id: postId }),
        });

        const isJson = response.headers
          .get("content-type")
          ?.includes("application/json");

        if (!response.ok) {
          const text = await response.text();
          throw new Error(`Сервер повернув статус ${response.status}: ${text}`);
        }

        const data = isJson ? await response.json() : {};

        // Создаем контейнер для сообщения и ссылки
        const messageEl = document.createElement("div");
        messageEl.className = "translation-message";
        messageEl.style.marginTop = "5px";
        messageEl.style.fontWeight = "bold";

        if (data.success) {
          messageEl.style.color = "green";
          messageEl.textContent = data.message || "Переклад створено";
        } else {
          messageEl.style.color = "red";
          messageEl.textContent = `❌ Помилка: ${data.message || "Щось пішло не так"}`;
        }

        // Если есть engUrl — добавляем ссылку всегда
        if (data.engUrl) {
          const link = document.createElement("a");
          link.href = data.engUrl;
          link.target = "_blank";
          link.rel = "noopener noreferrer";
          link.textContent = "Відкрити переклад";
          link.style.marginLeft = "8px";
          link.style.color = "#0073aa";
          link.style.textDecoration = "underline";
          link.style.cursor = "pointer";

          messageEl.appendChild(link);
        }

        container.appendChild(messageEl);
      } catch (err) {
        alert(`❌ Запит не вдався: ${err.message}`);
      } finally {
        btn.disabled = false;
        btn.textContent = "Перекласти";
      }
    });
  });
});
