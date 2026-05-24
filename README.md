# TechDesk Homelab Core

Modern, secure, one-click homelab stack built for **Hostinger Docker Manager + GitHub**.

### Included Services
- **Nginx Proxy Manager** – Reverse proxy + free SSL
- **MariaDB** – Production database
- **phpMyAdmin** – Database web UI
- **WireGuard VPN** (`wg-easy`) – Secure remote access
- **Portainer** – Full Docker management (containers, ports, logs, stats)
- **Landing Dashboard** (`panel.techdeskpro.com`) – Beautiful homepage with one-click links

All domains are pre-planned:
- `panel.techdeskpro.com` → Dashboard
- `npm.panel.techdeskpro.com` → NPM Admin
- `db.panel.techdeskpro.com` → phpMyAdmin
- `vpn.panel.techdeskpro.com` → WireGuard VPN
- `portainer.panel.techdeskpro.com` → Portainer

---

### Folder Structure

techdesk-homelab-core/
├── docker-compose.yml
├── panel.techdeskpro.com/
│   └── public/
│       └── index.html
├── .env.example
└── README.md


---

### Quick Deploy on Hostinger

1. Go to **hPanel → Docker Manager → Compose**
2. Choose **"Compose from URL"**
3. Paste your GitHub repo URL:  
   `https://github.com/YOUR-USERNAME/YOUR-REPO-NAME`
4. Add these **Environment Variables** (exact keys):

   | Key                    | Value                                      | Description                          |
   |------------------------|--------------------------------------------|--------------------------------------|
   | `DB_ROOT_PASSWORD`     | `your_very_long_strong_unique_password`    | MariaDB root password                |
   | `WG_HOST`              | `your-server-public-ip-or-domain.com`      | Public IP or domain for VPN clients  |
   | `VPN_UI_PASSWORD`      | `your_strong_vpn_password`                 | WireGuard web UI password            |

5. Click **Deploy**

---

### Post-Deployment – One-Time NPM Setup

After the stack is running, go to `http://YOUR-SERVER-IP:81`

Default NPM login:  
**Email:** `admin@example.com`  
**Password:** `changeme` (change immediately!)

Create these **5 Proxy Hosts**:

| Domain                        | Forward Hostname/IP | Port  | Force SSL | WebSockets Support |
|-------------------------------|---------------------|-------|-----------|--------------------|
| `panel.techdeskpro.com`       | `landing`           | 80    | Yes       | No                 |
| `npm.panel.techdeskpro.com`   | `npm`               | 81    | Yes       | No                 |
| `db.panel.techdeskpro.com`    | `phpmyadmin`        | 80    | Yes       | No                 |
| `vpn.panel.techdeskpro.com`   | `wg-easy`           | 51821 | Yes       | **Yes**            |
| `portainer.panel.techdeskpro.com` | `portainer`     | 9000  | Yes       | **Yes**            |

---

### How to Fully Reset Your Server (while keeping GitHub repo)

**⚠️ WARNING:** This will delete all containers, networks, and (optionally) data. Back up anything important first.

Run these commands via **SSH** on your Hostinger VPS:

```bash
# 1. Go to your compose project folder (usually under /docker or wherever Hostinger stored it)
cd /path/to/your/compose/folder   # ← check with `ls` or Hostinger file manager

# 2. Stop and remove everything
docker compose down --rmi all --volumes --remove-orphans

# 3. (OPTIONAL) Full wipe – removes ALL persistent data
# docker volume rm $(docker volume ls -q | grep -E 'npm_data|letsencrypt_data|mariadb_data|wg_easy_data|portainer_data')

# 4. Clean up unused images and networks (optional but recommended)
docker system prune -f

echo "✅ Server fully reset! Your GitHub repo is untouched."
