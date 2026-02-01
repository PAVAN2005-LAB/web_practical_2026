---
description: How to enable GitHub Pages for this project
---

To enable GitHub Pages and make your website public, follow these steps:

1.  **Go to GitHub**: Open your repository `web_practical_2026` on GitHub.
2.  **Settings**: Click on the **Settings** tab at the top of the page.
3.  **Pages**: On the left sidebar, click on **Pages** (under the "Code and automation" section).
4.  **Build and deployment**:
    *   Under **Source**, ensure **Deploy from a branch** is selected.
    *   Under **Branch**, click the dropdown and select `main`.
    *   Ensure the folder is set to `/(root)`.
    *   Click **Save**.
5.  **Wait**: After clicking save, GitHub will start a deployment. It may take 1-2 minutes.
6.  **Visit**: Once finished, GitHub will show a link at the top of the Pages section (e.g., `https://pavan2005-lab.github.io/web_practical_2026/`). Click it to see your site!

// turbo
7. Run these commands to push the changes:
   ```powershell
   git add .
   git commit -m "Configure for GitHub Pages - rename to index.html and add workflow"
   git push
   ```
